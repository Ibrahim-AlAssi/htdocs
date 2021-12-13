@extends('master')
@section('content')
<div class="custom-product">
    <div class="col-sm-10">
        <table class="table">
            
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Amout</td>
                <td>${{$prodect}}</td>
                
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>tax</td>
                <td>$ 0</td>
                
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>delirvery</td>
                <td>$ 10</td>
                
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>Total Amount</td>
                <td>$ {{$prodect+10}}</td>
                
              </tr>
            </tbody>
          </table>
          <div>
            <form action="/orderPlace" method="POST" >
              @csrf
                <div class="form-group">
                    <label for="pwd">Enter your adders</label>
                  <textarea type="email" name="address"  placeholder="Enter your adders" class="form-control" > </textarea>
                </div>
                <div class="form-group">
                  <label for="pwd">Payment method</label>
                  <input type="radio" name="payment" id="pwd" value="paypale"><span>paypale</span>
                  <input type="radio" name="payment" id="pwd" value="Emi"><span>Emi </span>
                  <input type="radio" name="payment" id="pwd" value="Payment on delirvery"><span>Payment on delirvery</span>

                </div>
                
                <button style="background-color:green" type="submit" class="btn btn-default">order now</button>
              </form>
          </div>
    </div>
</div> 





@endsection