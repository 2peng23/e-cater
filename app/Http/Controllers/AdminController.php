<?php

namespace App\Http\Controllers;

use App\Models\BillingInformation;
use App\Models\Cake;
use App\Models\CakeOrder;
use App\Models\Category;
use App\Models\CaterStock;
use App\Models\Package;
use App\Models\Rental;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function cake(Request $request)
    {
        $cakes = DB::table('cakes')->orderBy('updated_at', 'desc');
        $category_name = $request->category;
        $page = $request->input('cake_page', 10);

        if ($category_name) {
            $cakes->where('category', 'like', "%{$category_name}%");
        }

        // Paginate the results
        $cakes = $cakes->paginate($page);

        // Append parameters to pagination links
        $cakes->appends(['category' => $category_name, 'cake_page' => $page]); // Use 'cake_page' instead of 'page'

        $category = Category::latest()->get();
        return view('admin.cake', compact('category', 'cakes', 'category_name', 'page'));
    }

    // create cake category
    public function createCategory(Request $request)
    {
        $name = $request->category_name;
        $existing = Category::where('category_name', $name)->first();
        if ($existing) {
            return response()->json([
                'error' => 'Category already exsisted!'
            ]);
        }
        $category = new Category();
        $category->category_name = $name;
        $category->save();
        return response()->json([
            'success' => 'Category added!'
        ]);
    }
    public function addCake(Request $request)
    {
        $cake = new Cake();
        $cake->category = $request->category;
        $cake->price = $request->price;
        // image
        $photo = $request->image;
        $photoname = $photo->getClientOriginalName();
        $folder_name = $request->category;

        // Create the directory if it doesn't exist
        Storage::makeDirectory('public/images/cake/' . $folder_name);

        // Move the uploaded image to the specified directory
        $photo->move(public_path('images/cake/' . $folder_name), $photoname);

        // Save the image path to the database
        $cake->image = 'images/cake/' . $folder_name . '/' . $photoname;
        $cake->save();


        return response()->json([
            'success' => "Cake added!"
        ]);
    }
    public function editStock(Request $request)
    {
        $id = $request->id;
        $cake = Cake::find($id);
        return response()->json([
            'cake' => $cake
        ]);
    }
    public function addStock(Request $request)
    {
        $id = $request->cake_id;
        $stock_quantity = $request->stock;
        // create new stock
        $stock = new Stock();
        $stock->item_id = $id;
        $stock->beginning_stock = $request->beginning_stock;
        $stock->ending_stock = $request->ending_stock;
        $stock->quantity = $stock_quantity;
        $stock->save();


        // update cake stock
        $cake = Cake::find($id);
        $cake->stock = $cake->stock + $stock_quantity;
        $cake->save();
        return response()->json([
            'success' => 'Stock updated'
        ]);
    }
    public function cakeInfo(Request $request)
    {
        $id = $request->id;
        $cake = Cake::find($id);
        return response()->json([
            'cake' => $cake
        ]);
    }
    public function updateCake(Request $request)
    {
        $id = $request->cake_id;
        $cake = Cake::find($id);
        $cake->category = $request->update_category;
        $cake->price = $request->update_price;
        // image
        $photo = $request->update_image;
        if ($photo) {
            $photoname = $photo->getClientOriginalName();
            $folder_name = $request->category;

            // Create the directory if it doesn't exist
            Storage::makeDirectory('public/images/cake/' . $folder_name);

            // Move the uploaded image to the specified directory
            $photo->move(public_path('images/cake/' . $folder_name), $photoname);

            // Save the image path to the database
            $cake->image = 'images/cake/' . $folder_name . '/' . $photoname;
        }
        $cake->save();
        return response()->json([
            'success' => "Cake updated!"
        ]);
    }

    public function deleteCake(Request $request)
    {
        $id = $request->id;
        $cake = Cake::find($id);
        $cake->delete();
        return response()->json([
            'error' => "Cake deleted!"
        ]);
    }


    // catering
    public function catering()
    {
        $packages = Package::all();
        return view('admin.catering', compact('packages'));
    }
    public function addPackage(Request $request)
    {
        $package = new Package();
        $package->name = $request->name;
        $package->price = $request->price;
        $package->inclusion = $request->inclusion;
        $photo = $request->image;
        if ($photo) {
            $photoname = $photo->getClientOriginalName();

            // Move the uploaded image to the specified directory
            $photo->move(public_path('images/package'), $photoname);

            // Save the image path to the database
            $package->image = 'images/package/' . $photoname;
        }
        $package->save();
        return response()->json([
            'success' => "Package added!"
        ]);
    }
    public function editCater(Request $request)
    {
        $id = $request->id;
        $cater = Package::find($id);
        return response()->json([
            'package' => $cater
        ]);
    }
    public function updatePackage(Request $request)
    {
        $id = $request->edit_id;
        $package = Package::find($id);
        $package->name = $request->edit_name;
        $package->price = $request->edit_price;
        $newInclusions = $request->edit_inclusion;
        $existingInclusions = $package->inclusion;

        if ($newInclusions) {
            // Use array_merge to combine the arrays
            $combinedInclusions = array_merge($existingInclusions, $newInclusions);
            $package->inclusion = $combinedInclusions;
        }
        $photo = $request->edit_image;
        if ($photo) {
            $photoname = $photo->getClientOriginalName();

            // Move the uploaded image to the specified directory
            $photo->move(public_path('images/package'), $photoname);

            // Save the image path to the database
            $package->image = 'images/package/' . $photoname;
        }
        $package->save();
        return response()->json([
            'success' => 'Package updated!'
        ]);
    }
    public function deleteCater(Request $request)
    {
        $id = $request->id;
        $package = Package::find($id);
        $package->delete();
        return response()->json([
            'error' => "Package deleted!"
        ]);
    }
    public function deleteInclusion(Request $request)
    {
        $id = $request->id;
        $index = $request->index;

        $package = Package::find($id);

        $inclusions = $package->inclusion;


        // Delete the inclusion at the specified index
        unset($inclusions[$index]);

        // Reindex the array to maintain consecutive keys
        $inclusions = array_values($inclusions);

        // Update the package with the modified inclusions
        $package->update(['inclusion' => $inclusions]);

        return response()->json(['error' => 'Deleted']);
    }
    public function editCaterStock(Request $request)
    {
        $id = $request->id;
        $cater = Package::find($id);
        return response()->json([
            'cater' => $cater
        ]);
    }
    public function addCaterStock(Request $request)
    {
        $id = $request->cater_id;
        $cater = Package::find($id);
        $cater->quantity += $request->stock;
        $cater->save();


        $stock = new CaterStock();
        $stock->item_id = $request->cater_id;
        $stock->beginning_stock = $request->beginning_stock;
        $stock->ending_stock = $request->ending_stock;
        $stock->quantity = $request->stock;
        $stock->save();
        return response()->json([
            'success' => "Stock updated!"
        ]);
    }

    // biling info
    public function billingInfo()
    {
        $billing = BillingInformation::all();
        return view('admin.billing', compact('billing'));
    }
    public function addBilling(Request $request)
    {
        $billing = new BillingInformation();
        $billing->name = $request->name;
        $billing->number = $request->number;
        $photo = $request->image;
        if ($photo) {
            $photoname = $photo->getClientOriginalName();

            // Move the uploaded image to the specified directory
            $photo->move(public_path('images/billing'), $photoname);

            // Save the image path to the database
            $billing->image = 'images/billing/' . $photoname;
        }
        $billing->save();

        return response()->json([
            'success' => "Account information added!"
        ]);
    }
    public function clientRental(Request $request)
    {
        $rentals = DB::table('rentals')->orderBy('updated_at', 'desc');
        // Retrieve input parameters
        $name = $request->input('rental_name');
        $date = $request->input('rental_date');
        // $page = $request->input('page_select', 5); // Set a default value for page if not provided
        // Apply filters
        if ($name) {
            $rentals->where('name', 'like', "%{$name}%");
        }

        // Search by Date Range
        if ($date) {
            $dateArray = explode(' - ', $date);
            $start_date = \Carbon\Carbon::createFromFormat('m/d/Y', $dateArray[0])->startOfDay();
            $end_date = \Carbon\Carbon::createFromFormat('m/d/Y', $dateArray[1])->endOfDay();
            $rentals = $rentals->whereBetween('created_at', [$start_date, $end_date]);
        }
        // Paginate the results
        $rentals = $rentals->paginate(10);

        // Append parameters to pagination links
        $rentals->appends(['appointment_name' => $name, 'appointment_date' => $date]);
        return view('admin.rentals', compact('rentals', 'name', 'date'));
    }
    public function approveRent($id)
    {
        $rental = Rental::find($id);
        $rental->status = 'approved';
        $rental->save();
        $details = [
            'greetings' => 'Dear Mr/Mrs ' . $rental->name . ',',
            'body' => " Your Package Rental Successfully Confirmed!. We're thrilled to share the fantastic news that your package rental request has been successfully processed! Your chosen package is now reserved and ready to enhance your experience.",
            'actiontext' => 'View rental details ',
            'actionurl' => url('my-orders&rentals'),
            'endpart' => ' Thank You!'
        ];
        // Construct the request body
        $body = [
            'number' => $rental->phone,
            'message' => $details['greetings'] . $details['body'] . $details['actiontext'] . $details['actionurl'] . $details['endpart'],
            'sendername' => 'SEMAPHORE',
            'apikey' => 'bf09f02bd326ac4b087d104786368fdf' // Replace with your Semaphore API key
        ];

        // Send the request using Guzzle HTTP client
        $client = new \GuzzleHttp\Client();
        $response = $client->post('https://api.semaphore.co/api/v4/messages', [
            'form_params' => $body
        ]);
        // Check the response status code
        $statusCode = $response->getStatusCode();
        if ($statusCode === 200) {
            // SMS sent successfully
            return response()->json([
                'success' => 'Cake Order has been declined. Client successfully notified!'
            ]);
        } else {
            // SMS sending failed
            return response()->json(['error' => 'SMS sending failed']);
        }
    }
    public function declineRent($id)
    {
        $rental = Rental::find($id);
        $rental->status = 'declined';
        $rental->save();
        $details = [
            'greetings' => 'Dear Mr/Mrs ' . $rental->name . ',',
            'body' => " Your Package Rental has been declined!.  Please make new rental request.",
            'actiontext' => 'View rental details ',
            'actionurl' => url('my-orders&rentals'),
            'endpart' => ' Thank You!'
        ];
        // Construct the request body
        $body = [
            'number' => $rental->phone,
            'message' => $details['greetings'] . $details['body'] . $details['actiontext'] . $details['actionurl'] . $details['endpart'],
            'sendername' => 'SEMAPHORE',
            'apikey' => 'bf09f02bd326ac4b087d104786368fdf' // Replace with your Semaphore API key
        ];

        // Send the request using Guzzle HTTP client
        $client = new \GuzzleHttp\Client();
        $response = $client->post('https://api.semaphore.co/api/v4/messages', [
            'form_params' => $body
        ]);
        // Check the response status code
        $statusCode = $response->getStatusCode();
        if ($statusCode === 200) {
            // SMS sent successfully
            return response()->json([
                'error' => 'Cake Order has been declined. Client successfully notified!'
            ]);
        } else {
            // SMS sending failed
            return response()->json(['error' => 'SMS sending failed']);
        }
    }
    public function allCakeOrder(Request $request)
    {
        $cakes = DB::table('cake_orders')->orderBy('updated_at', 'desc');
        // Retrieve input parameters
        $name = $request->input('rental_name');
        $date = $request->input('rental_date');
        // $page = $request->input('page_select', 5); // Set a default value for page if not provided
        // Apply filters
        if ($name) {
            $cakes->where('name', 'like', "%{$name}%");
        }

        // Search by Date Range
        if ($date) {
            $dateArray = explode(' - ', $date);
            $start_date = \Carbon\Carbon::createFromFormat('m/d/Y', $dateArray[0])->startOfDay();
            $end_date = \Carbon\Carbon::createFromFormat('m/d/Y', $dateArray[1])->endOfDay();
            $cakes = $cakes->whereBetween('created_at', [$start_date, $end_date]);
        }
        // Paginate the results
        $cakes = $cakes->paginate(10);

        // Append parameters to pagination links
        $cakes->appends(['appointment_name' => $name, 'appointment_date' => $date]);
        return view('admin.all-cake-order', compact('cakes', 'name', 'date'));
    }
    public function getBillingImage(Request $request)
    {
        $cake_order = $request->cake_id;
        if ($cake_order) {
            $data = CakeOrder::find($cake_order);
            $cake = Cake::where('id', $data->item_id)->first();
            return response()->json([
                'image' => $data->image,
                'quantity' => $data->quantity,
                'downpayment' => $data->downpayment,
                'price' => $cake->price,
                'totalPrice' => $data->quantity * $cake->price,
            ]);
        }
        $rental = $request->rental_id;
        if ($rental) {
            $data = Rental::find($rental);
            $rental = Package::where('id', $data->item_id)->first();
            return response()->json([
                'price' => $rental->price,
                'downpayment' => $data->downpayment,
                'image' => $data->image
            ]);
        }
    }
    public function getMessage($id)
    {
        $data = CakeOrder::find($id);
        return response()->json([
            'message' => $data->customize
        ]);
    }
    public function approveCake($id)
    {
        $cakeOrder = CakeOrder::find($id);
        $cakeOrder->status = 'approved';
        $cakeOrder->save();
        $details = [
            'greetings' => 'Dear Mr/Mrs ' . $cakeOrder->name . ',',
            'body' => 'Your cake order has been confirmed. Kindly go to Murillo Cake Haus and Catering Service.',
            'actiontext' => 'View order details ',
            'actionurl' => url('my-orders&rentals'),
            'endpart' => ' Thank You!'
        ];
        // Construct the request body
        $body = [
            'number' => $cakeOrder->phone,
            'message' => $details['greetings'] . $details['body'] . $details['actionurl'] . $details['endpart'],
            'sendername' => 'SEMAPHORE',
            'apikey' => 'bf09f02bd326ac4b087d104786368fdf' // Replace with your Semaphore API key
        ];

        // Send the request using Guzzle HTTP client
        $client = new \GuzzleHttp\Client();
        $response = $client->post('https://api.semaphore.co/api/v4/messages', [
            'form_params' => $body
        ]);
        // Check the response status code
        $statusCode = $response->getStatusCode();
        if ($statusCode === 200) {
            // SMS sent successfully
            return response()->json([
                'success' => 'Cake Order has been confirmed. Client successfully notified!'
            ]);
        } else {
            // SMS sending failed
            return response()->json(['error' => 'SMS sending failed']);
        }
    }
    public function declineCake($id)
    {
        $cakeOrder = CakeOrder::find($id);
        $cakeOrder->status = 'declined';
        $cakeOrder->save();
        $details = [
            'greetings' => 'Dear Mr/Mrs ' . $cakeOrder->name . ',',
            'body' => 'Your cake order has been declined. Please make another purchase.',
            'actiontext' => 'View order details ',
            'actionurl' => url('my-orders&rentals'),
            'endpart' => ' Thank You!'
        ];
        // Construct the request body
        $body = [
            'number' => $cakeOrder->phone,
            'message' => $details['greetings'] . $details['body'] . $details['actionurl'] . $details['endpart'],
            'sendername' => 'SEMAPHORE',
            'apikey' => 'bf09f02bd326ac4b087d104786368fdf' // Replace with your Semaphore API key
        ];

        // Send the request using Guzzle HTTP client
        $client = new \GuzzleHttp\Client();
        $response = $client->post('https://api.semaphore.co/api/v4/messages', [
            'form_params' => $body
        ]);
        // Check the response status code
        $statusCode = $response->getStatusCode();
        if ($statusCode === 200) {
            // SMS sent successfully
            return response()->json([
                'error' => 'Cake Order has been declined. Client successfully notified!'
            ]);
        } else {
            // SMS sending failed
            return response()->json(['error' => 'SMS sending failed']);
        }
    }
}
