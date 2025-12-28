<?php
namespace App\Http\Controllers\Admin\panel;

use App\Http\Controllers\Controller;
use App\Models\License;
use App\Models\User;
use App\Models\Order;
use App\Models\Course;
use Illuminate\Http\Request;

class LicenseController extends Controller
{
    public function index()
    {
        $licenses = License::with(['user', 'order', 'course'])->latest()->paginate(20);
        return view('admin.licenses.index', compact('licenses'));
    }

    public function create()
    {
        $users   = User::all();
        $orders  = Order::all();
        $courses = Course::all();

        return view('admin.licenses.create', compact('users', 'orders', 'courses'));
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'user_id'        => 'required|exists:users,id',
            'order_id'       => 'required|exists:orders,id',
            'course_id'      => 'required|exists:courses,id',
            'spotplayer_id'  => 'nullable|string',
            'spotplayer_key' => 'nullable|string',
            'spotplayer_url' => 'nullable|string',
            'course_ids'     => 'nullable|array',
            'license_data'   => 'nullable|array',
        ]);

        $order = auth()->user()->orders()->create([
            'price'=>  Course::where('id',$data['course_id'])->first()->price,
            'status'=>'paid'
        ]);
        $order->payments()->create([
            'gateway' => 'ثبت از پنل مدیریت',
            'status' => 'paid',
        ]);
        $data['order_id'] = $order->id;
        License::create($data);

        return redirect()->route('admin.licenses.index')->with('success', 'License created successfully.');
    }

    public function show(License $license)
    {
        return view('admin.licenses.show', compact('license'));
    }

    public function edit(License $license)
    {
        $users   = User::all();
        $orders  = Order::all();
        $courses = Course::all();

        return view('admin.licenses.edit', compact('license', 'users', 'orders', 'courses'));
    }

    public function update(Request $request, License $license)
    {
        $data = $request->validate([
            'user_id'        => 'required|exists:users,id',
            'order_id'       => 'required|exists:orders,id',
            'course_id'      => 'required|exists:courses,id',
            'spotplayer_id'  => 'nullable|string',
            'spotplayer_key' => 'nullable|string',
            'spotplayer_url' => 'nullable|string',
            'course_ids'     => 'nullable|array',
            'license_data'   => 'nullable|array',
        ]);

        $license->update($data);

        return redirect()->route('admin.licenses.index')->with('success', 'License updated successfully.');
    }

    public function destroy(License $license)
    {
        $license->delete();
        return redirect()->route('admin.licenses.index')->with('success', 'License deleted successfully.');
    }
}
