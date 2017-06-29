@if(session()->has('approved'))
              <center class="alert alert-success" style="font-weight: bold;">{{session()->get('approved')}}</center>
           @endif 