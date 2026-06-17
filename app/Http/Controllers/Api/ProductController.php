<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
class ProductController extends Controller
{
    /**
     * Endpoint: GET /api/products
     * Fetch all products including embedded category details.
     */
    public function index(): JsonResponse
    {
        $products = Product::with('category')->get();
        return response()->json([
            'success' => true,
            'data'    => $products
        ], 200);
    }
    /**
     * Endpoint: POST /api/products
     * Process multi-part payloads, validate manually, and store structural records.
     */
    public function store(Request $request): JsonResponse
    {
        // Requirement C: Explicit Input Validation Matrix via Validator::make()
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:255',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price'       => 'required|numeric|min:0',
            'quantity'    => 'required|integer|min:0',
            'stock'       => 'required|integer|min:0',
            'is_active'   => 'boolean',
        ]);
        // Graceful error pipeline triggering a 422 standard response structure
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation parameters failed.',
                'errors'  => $validator->errors()
            ], 422);
        }
        $validated = $validator->validated();
        $validated['is_active'] = $request->boolean('is_active', true);
        // File Upload Pipeline
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        }
        $product = Product::create($validated);
        $product->load('category');
        return response()->json([
            'success' => true,
            'data'    => $product
        ], 201);
    }
    /**
     * Endpoint: GET /api/products/{product}
     * Render data records for a standalone product alongside its parent category.
     */
    public function show(Product $product): JsonResponse
    {
        $product->load('category');
        return response()->json([
            'success' => true,
            'data'    => $product
        ], 200);
    }
    /**
     * Endpoint: POST /api/products/{product} (Using method spoofing via form-data)
     * Update target records and handle physical file replacements safely.
     */
    public function update(Request $request, Product $product): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:255',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price'       => 'required|numeric|min:0',
            'quantity'    => 'required|integer|min:0',
            'stock'       => 'required|integer|min:0',
            'is_active'   => 'boolean',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation parameters failed.',
                'errors'  => $validator->errors()
            ], 422);
        }
        $validated = $validator->validated();
        $validated['is_active'] = $request->boolean('is_active', $product->is_active);
        // File Replacement Pipeline
        if ($request->hasFile('image')) {
            // Delete old file asset from storage disk if a replacement exists
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        }
        $product->update($validated);
        $product->load('category');
        return response()->json([
            'success' => true,
            'data'    => $product
        ], 200);
    }
    /**
     * Endpoint: DELETE /api/products/{product}
     * Safely drop files from local disk storage, then purge the row record.
     */
    public function destroy(Product $product): JsonResponse
    {
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return response()->json([
            'success' => true,
            'message' => 'Product and linked assets successfully removed.'
        ], 200);
    }
}
