@extends('client.layouts.app')
@section('content')
    <div wire:ignore.self>
        <livewire:order-history-component wire:key="orderHistory"></livewire:order-history-component>
    </div>
@endsection
