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

class InventoryController extends Controller
{
    //
    public function viewCategory()
    {
        $categories = Category::get();
        return view('inventory.categories', compact('categories'));
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


    public function viewBrands()
    {
        $brands = Brand::get();
        return view('inventory.brands', compact('brands'));

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



    public function getProducts()
    {
        $products = Product::get();
        return view('inventory.products', compact('products'));

    }


    public function addProduct()
    {
        $categories = Category::get();
        $brands=Brand::get();
        $units=Unit::get();
        return view('inventory.addProduct',compact('categories','brands','units'));

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
        $product->unit_stock = $request->unit_stock;
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

    public function storeUnit(Request $request)
    {
        $unit = new Unit();
        $unit->unit = $request->unit;
        $unit->save();
        return Redirect()->back();

    }

    public function viewTaxes()
    {
        $taxes = Tax::get();
        return view('inventory.tax', compact('taxes'));

    }

    public function storeTax(Request $request)
    {
        $value = $request->value . " " . $request->sym;
        $tax = new Tax();
        $tax->taxName = $request->taxName;
        $tax->value = $value;
        $tax->taxFor = $request->taxFor;
        $tax->save();
        return Redirect()->route('viewTaxes');
    }


    public function getAppliedTaxes()
    {
        $appliedTaxes = Applytax::get();
        $taxes = Tax::get();
        return view('inventory.applyTax', compact('appliedTaxes', 'taxes'));

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

    public function stockInvoices()
    {
        $stockCounts = Stock::get();
        return view('inventory.stockInvoices', compact('stockCounts'));

    }

    public function storeStockInvoice(Request $request)
    {
        $taxes = implode(',', $request->taxes);
        $chk = Applytax::where('vtype', $request->vtype)->first();

        $atax = Applytax::find($chk->id);

        $atax->vtype = $request->vtype;
        $atax->atax = $taxes;
        $atax->save();
        return Redirect()->route('getAppliedTaxes');
    }

    public function createStockInvoice(Request $request)
    {
        $products=Product::get();
        return view('inventory.createStockInvoice',compact('products'));
    }
}
