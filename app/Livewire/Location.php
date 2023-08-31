<?php

namespace App\Livewire;

use App\Models\Address;
use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class Location extends Component
{
    public $name, $email, $houseNumber, $phone;
    public $provinceId;
    public $districts = [];
    public $districtId;
    public $wards = [];
    public $wardId;

    public function newAddress(): void
    {
        $validatedData = $this->validate(
            [
                'name' => ['required', 'max:255'],
                'email' => ['required', 'email'],
                'houseNumber' => ['required'],
                'phone' => ['required', 'numeric', 'regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'],
                'districtId' => ['required'],
                'provinceId' => ['required'],
                'wardId' => ['required'],
            ],
            [
                'name.required' => 'Trường này không được bỏ trống.',
                'houseNumber.required' => 'Trường này không được bỏ trống.',
                'houseNumber.max' => 'Tối đa 255 kí tự.',
                'email.required' => 'Trường này không được bỏ trống.',
                'provinceId.required' => 'Trường này không được bỏ trống.',
                'districtId.required' => 'Trường này không được bỏ trống.',
                'wardId.required' => 'Trường này không được bỏ trống.',
                'phone.required' => 'Trường này không được bỏ trống.',
                'phone.numeric' => 'Sai định dạng.',
                'phone.regex' => 'Sai định dạng.',
            ]
        );

        if (Auth::user()->addresses->count() < 5) {
            $validatedData['name'] = $this->name;
            $validatedData['email'] = $this->email;
            $validatedData['house_number'] = $this->houseNumber;
            $validatedData['phone'] = $this->phone;
            $validatedData['user_id'] = Auth::user()->id;
            $validatedData['district_id'] = $this->districtId;
            $validatedData['province_id'] = $this->provinceId;
            $validatedData['ward_id'] = $this->wardId;
            Address::create($validatedData);
            $this->reset();
        } else {
            session()->flash('warning', 'Mỗi người không thể thêm quá 5 địa chỉ.');
            $this->reset();
        }
    }

    public function render(): View
    {
        $provinces = Province::all();

        if (! empty($this->provinceId)) {
            $this->districts = District::where('province_id', $this->provinceId)->get();
        }
        if (! empty($this->districtId)) {
            $this->wards = Ward::where('district_id', $this->districtId)->get();
        }

        $addresses = Address::where('user_id', Auth::id())->get();

        return view('livewire.location', [
            'addresses' => $addresses,
            'provinces' => $provinces,
        ]);
    }
}
