<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use Validator;

class InventoryController extends Controller
{
    // Fetch all inventory items
    public function index(Request $request)
    {
        $category = $request->input('category');
        $search = $request->input('search');

        $inventories = Inventory::query();

        if ($category) {
            $inventories->where('category', $category);
        } else {
            $categories = ['Home Decor', 'Art', 'Bath and Body', 'Accessories', 'Clothing', 'Jewelry', 'Stationery', 'Holiday Decor', 'Toys'];
            $inventories->whereIn('category', $categories);
        }

        if ($search) {
            $inventories->where('name', 'like', '%' . $search . '%');
        }

        $inventories = $inventories->get();

        // Check if there are items in the database
        if ($inventories->isEmpty()) {
            return view('inventory.index', ['inventories' => []]);
        }

        return view('inventory.index', compact('inventories'));
    }


    // Store a new inventory item
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category' => 'nullable|string',
            'materials' => 'nullable|array', // Accepts array
            'images' => 'nullable|string',
            'currentStock' => 'required|integer|min:0',
            'reorderLevel' => 'required|integer|min:0'
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                "status" => 422,
                "errors" => $validator->errors()
            ], 422);
        }
    
        // Convert materials array to JSON before inserting
        $requestData = $request->all();
        if (isset($requestData['materials'])) {
            $requestData['materials'] = json_encode($requestData['materials']);
        }
    
        // Create Inventory Item
        $inventory = Inventory::create($requestData);
    
        return response()->json([
            'status' => 200,
            'message' => 'Inventory item added successfully',
            'inventory' => $inventory
        ], 200);
    }
    
    public function inventorystore()
    {
        $inventories = Inventory::all(); // Fetch all inventory data
        return view('inventory.index', compact('inventories')); // Pass data to the view

        
    }
    
    // Show a specific inventory item
    public function show($id)
    {
        $inventory = Inventory::find($id);
    
        if (!$inventory) {
            return response()->json([
                'status' => 404,
                'message' => 'Inventory item not found.'
            ], 404);
        }
    
        return response()->json([
            'status' => 200,
            'inventory' => $inventory
        ], 200);
    }

    // Edit an inventory item
    public function edit($id)
    {
        $inventory = Inventory::find($id);
    
        if (!$inventory) {
            return response()->json([
                'status' => 404,
                'message' => 'Inventory item not found.'
            ], 404);
        }
    
        return response()->json([
            'status' => 200,
            'inventory' => $inventory
        ], 200);
    }

    public function kitchenware()
    {
        return view('inventory.kitchenware', compact('inventories')); // Pass filtered data to view
    }
}
