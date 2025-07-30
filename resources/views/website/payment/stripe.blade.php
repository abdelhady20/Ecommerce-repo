@extends('website.layouts.app')

@section('title', 'Secure Payment')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg rounded-4 border-0">
                    <div class="card-body p-5">
                        <h3 class="text-center mb-4 text-primary fw-bold">Secure Payment with Stripe</h3>

                        {{-- Error Message --}}
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @elseif($errors->has('stripe'))
                            <div class="alert alert-danger">{{ $errors->first('stripe') }}</div>
                        @endif

                        <form action="{{ route('shop.stripe.charge') }}" method="POST" id="payment-form">
                            @csrf

                            {{-- Card Element --}}
                            <div class="form-group mb-3">
                                <label for="card-element" class="form-label fw-semibold">
                                    Credit or Debit Card
                                </label>
                                <div id="card-element" class="form-control py-3 px-3 rounded-3">
                                    <!-- Stripe Element will be inserted here -->
                                </div>
                                <div id="card-errors" class="text-danger mt-2 small"></div>
                            </div>

                            {{-- Submit Button --}}
                            <button type="submit" class="btn btn-primary w-100 py-2 mt-3 fw-bold">
                                Pay ${{ number_format($amount, 2) }}
                            </button>

                            {{-- Loading Spinner --}}
                            <div id="loading" class="text-center mt-3 d-none">
                                <span class="spinner-border spinner-border-sm text-primary"></span> Processing...
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Stripe.js --}}
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const stripe = Stripe("{{ config('services.stripe.key') }}");
            const elements = stripe.elements();

            const style = {
                base: {
                    fontSize: '16px',
                    color: '#32325d',
                    fontFamily: 'inherit',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

            const card = elements.create('card', { style: style });
            card.mount('#card-element');

            const form = document.getElementById('payment-form');

            form.addEventListener('submit', async function (event) {
                event.preventDefault();
                document.getElementById('loading').classList.remove('d-none');

                const {token, error} = await stripe.createToken(card);

                if (error) {
                    document.getElementById('card-errors').textContent = error.message;
                    document.getElementById('loading').classList.add('d-none');
                } else {
                    const hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', token.id);
                    form.appendChild(hiddenInput);
                    form.submit();
                }
            });
        });
    </script>
@endsection
