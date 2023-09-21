@extends('site.app')
@section('title', 'Checkout')

@section ('content')

<section class="section-pagetop bg-dark">
    <div class="container clearfix">
        <h2 class="title-page">Checkout</h2>
    </div>
</section>
<section class="section-content bg padding-y">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @if (Session::has('error'))
                    <p class="alert alert-danger">{{ Session::get('error') }}</p>
                @endif
            </div>
        </div>
        <form action="{{ route('checkout.place.order') }}" method="POST" role="form">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <header class="card-header">
                            <h4 class="card-title mt-2">Billing Details</h4>
                        </header>
                        <article class="card-body">
                            <div class="form-row">
                                <div class="col form-group">
                                    <label>First name</label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name">
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col form-group">
                                    <label>Last name</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name">
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>City</label>
                                    <input type="text" class="form-control" name="city">
                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Country</label>
                                    <input type="text" class="form-control @error('country') is-invalid @enderror" name="country">
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group  col-md-6">
                                    <label>Post Code</label>
                                    <input type="text" class="form-control" name="post_code">
                                </div>
                                <div class="form-group  col-md-6">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number">
                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" disabled>
                                <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label>Order Notes</label>
                                <textarea class="form-control" name="notes" rows="6"></textarea>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <header class="card-header">
                                    <h4 class="card-title mt-2">Your Order</h4>
                                </header>
                                <article class="card-body">
                                    <dl class="dlist-align">
                                        <dt>Total cost: </dt>
                                        <dd class="text-right h5 b"> {{ config('settings.currency_symbol') }}{{ \Cart::getSubTotal() }} </dd>
                                    </dl>
                                </article>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <button type="submit" class="subscribe btn btn-success btn-lg btn-block">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
