<h1>Payment Invoice # {{ $leadPayment->id }}</h1>

==================================================

<h3>You will find invoice information in the following link:</h3>
<p><a href="{{ route('invoice', $leadPayment->id) }}">Invoice Details</a></p>
