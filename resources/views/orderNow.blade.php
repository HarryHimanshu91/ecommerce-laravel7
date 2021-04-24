@extends('master')
@section('content')
<div class="container">

    <div class="row" style="margin-bottom: 40px;">
        <h3> Order Summary </h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Amount</th>
                    <td> Rs {{ $total}}</td>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Tax</th>
                    <td> Rs 0 </td>

                </tr>

                <tr>
                    <th scope="row">Delivery Charges </th>
                    <td> Rs 50 </td>

                </tr>

                <tr>
                    <th scope="row">Total Amount </th>
                    <td> Rs {{ $total + 50 }} </td>

                </tr>


            </tbody>
        </table>

    </div>

    <div class="row">

        <form action="{{ route('placeOrder') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Enter Your Address:</label>
                <textarea required class="form-control" name="address" id="address" placeholder="Enter Address"></textarea>
            </div>

            <div class="form-group">
                <label for="email">Mobile Number</label>
                <input maxlength="10" onkeypress="return AllowOnlyNumbers(event);" required type="text" class="form-control" name="phone" id="phone" placeholder="Enter Mobile">
            </div>


            <div class="form-group">
                <label for="pwd">Paymnet Method</label> <br />
                <input type="radio" value="online" name="payment" required> Online Payment <br />
                <input type="radio" value="emi" name="payment" required> Pay using EMI<br />
                <input type="radio" value="cash" name="payment" required> Cash On Delivery<br />
            </div>

            <button type="submit" class="btn btn-success">Order Now</button>
        </form>
    </div>
    <script>
        function AllowOnlyNumbers(e) {

            e = (e) ? e : window.event;
            var clipboardData = e.clipboardData ? e.clipboardData : window.clipboardData;
            var key = e.keyCode ? e.keyCode : e.which ? e.which : e.charCode;
            var str = (e.type && e.type == "paste") ? clipboardData.getData('Text') : String.fromCharCode(key);

            return (/^\d+$/.test(str));
        }
    </script>
</div>
@endsection