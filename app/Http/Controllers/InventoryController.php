<?php

namespace App\Http\Controllers;

use App\Models\Applytax;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Tax;
use App\Models\Unit;
use Illuminate\Http\Request;
use DB;

class InventoryController extends Controller
{
    //

    public function __construct()
    {
    }

    public function viewCategory()
    {
        $categories = Category::get();
        return view('inventory.categories', compact('categories'));
    }

    public function deleteCategory($id)
    {

        Category::find($id)->delete();
        $result = "success";
        return json_encode($result);
    }

    public function storeCategory(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->save();
        return Redirect()->route('viewCategory');

    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->save();
        return Redirect()->route('viewCategory');

    }

    public function editCategory($id)
    {
        $category = Category::get()->where('id', $id)->first();
        return view('inventory.editCategory', compact('category'));
    }


    public function viewBrands()
    {
        $brands = Brand::get();
        return view('inventory.brands', compact('brands'));

    }

    public function editBrand($id)
    {
        $brand = Brand::where('id', $id)->first();
        return view('inventory.editBrand', compact('brand'));
    }

    public function deleteBrand($id)
    {

        Brand::find($id)->delete();
        $result = "success";
        return json_encode($result);
    }

    public function storeBrand(Request $request)
    {
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->manufacturer = $request->manufacturer;
        $brand->description = $request->description;
        $brand->status = $request->status;
        $brand->save();
        return Redirect()->route('viewBrands');

    }

    public function updateBrand(Request $request, $id)
    {
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->manufacturer = $request->manufacturer;
        $brand->description = $request->description;
        $brand->status = $request->status;
        $brand->save();
        return Redirect()->route('viewBrands');

    }


    public function getProducts()
    {
        $products = Product::get();
        return view('inventory.products', compact('products'));

    }

    public function getProductHtml($id)
    {
        $product = DB::table('products')
            ->join('units', 'products.unit_id', 'units.id')
            ->select('products.*', 'units.unit')
            ->where('products.id', $id)
            ->get();;
        return json_encode($product);

    }

    public function deleteProduct($id)
    {

        Product::find($id)->delete();
        $result = "success";
        return json_encode($result);
    }


    public function addProduct()
    {
        $categories = Category::get();
        $brands = Brand::get();
        $units = Unit::get();
        return view('inventory.addProduct', compact('categories', 'brands', 'units'));

    }

    public function storeProduct(Request $request)
    {
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->code = $request->code;
        $product->reorder_level = $request->reorder_level;
        $product->barcode = $request->barcode;
        $product->min_stock = $request->min_stock;
        $product->narration = $request->narration;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->expiry_date = $request->expiry_date;
        $product->size = $request->size;
        $product->status = $request->status;
        $product->unit_id = $request->unit_id;
        $product->unit_stock = $request->quantity;
        $product->purchase_price = $request->purchase_price;
        $product->sale_price = $request->sale_price;
        $product->quantity = $request->quantity;

        $product->save();
        return Redirect()->back();

    }

    public function viewUnits()
    {
        $units = Unit::get();
        return view('inventory.units', compact('units'));

    }


    public function editUnit($id)
    {
        $unit = Unit::where('id', $id)->first();
        return view('inventory.editUnit', compact('unit'));

    }

    public function storeUnit(Request $request)
    {
        $unit = new Unit();
        $unit->unit = $request->unit;
        $unit->save();
        return Redirect()->back();

    }


    public function updateUnit(Request $request, $id)
    {
        $unit = Unit::find($id);
        $unit->unit = $request->unit;
        $unit->save();
        return Redirect()->route('viewUnits');

    }

    public function deleteUnit($id)
    {

        Unit::find($id)->delete();
        $result = "success";
        return json_encode($result);
    }


    public function viewTaxes()
    {
        $taxes = Tax::get();
        return view('inventory.tax', compact('taxes'));

    }


    public function editTax($id)
    {
        $tax = Tax::where('id', $id)->first();
        return view('inventory.editTax', compact('tax'));

    }

    public function storeTax(Request $request)
    {

        $tax = new Tax();
        $tax->taxName = $request->taxName;
        $tax->value = $request->value;
        $tax->sym = $request->sym;
        $tax->taxFor = $request->taxFor;
        $tax->save();
        return Redirect()->route('viewTaxes');
    }


    public function updateTax(Request $request, $id)
    {

        $tax = Tax::find($id);
        $tax->taxName = $request->taxName;
        $tax->value = $request->value;
        $tax->sym = $request->sym;
        $tax->taxFor = $request->taxFor;
        $tax->save();
        return Redirect()->route('viewTaxes');
    }

    public function deleteTax($id)
    {

        Tax::find($id)->delete();
        $result = "success";
        return json_encode($result);
    }


    public function getAppliedTaxes()
    {
        $appliedTaxes = Applytax::get();
        $taxes = Tax::get();
        return view('inventory.applyTax', compact('appliedTaxes', 'taxes'));

    }

    public function editAppliedTax($id)
    {
        $atax = Applytax::where('id', $id)->first();
        $taxes = Tax::get();
        return view('inventory.editAppliedTax', compact('atax', 'taxes'));

    }

    public function storeAppliedtax(Request $request)
    {
        $taxes = implode(',', $request->taxes);
        $chk = Applytax::where('vtype', $request->vtype)->first();
        if (empty($chk)) {
            $atax = new Applytax();
        } else {
            $atax = Applytax::find($chk->id);
        }
        $atax->vtype = $request->vtype;
        $atax->atax = $taxes;
        $atax->save();
        return Redirect()->route('getAppliedTaxes');
    }


    public function updateAppliedtax(Request $request, $id)
    {
        if (!empty($request->taxes)) {
            $taxes = implode(',', $request->taxes);
        }
        $chk = Applytax::where('vtype', $request->vtype)->first();
        if (empty($chk)) {
            $atax = new Applytax();
        } else {
            $atax = Applytax::find($chk->id);
        }
        $atax->vtype = $request->vtype;
        if (!empty($request->taxes)) {
            $atax->atax = $taxes;
        }else{
            $atax->atax ="";
        }
        $atax->save();
        return Redirect()->route('getAppliedTaxes');
    }

    public function deleteAppliedTax($id)
    {

        Applytax::find($id)->delete();
        $result = "success";
        return json_encode($result);
    }

    public function deleteStockInvoice($id)
    {

        Applytax::find($id)->delete();
        $result = "success";
        return json_encode($result);
    }

    public function stockInvoices()
    {
        $stockCounts = Stock::get();
        return view('inventory.stockInvoices', compact('stockCounts'));

    }


    public function storeStockInvoice(Request $request)
    {
        $items = $request->items;
        foreach ($items as $item) {
            $stock = new Stock();
            $item->product_id;
        }
        return Redirect()->back();
    }

    public function createStockInvoice(Request $request)
    {
        $products = Product::get();
        return view('inventory.createStockInvoice', compact('products'));
    }


}
