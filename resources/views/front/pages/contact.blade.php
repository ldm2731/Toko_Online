@extends('front/hello')

@section('content')
<style>
  .row {
    min-height: 75vh;
  }
</style>

    <div class="row pt-3">
      <div class="col-md-12">
        <form method="">
          <div class="row">
            <div class="col-md-12">
              <div class="contact-image">
                <img src="{{ url('') }}/assets/images/amdesain.png" alt="rocket_contact" />
              </div>
              <h3 class="py-3">Drop Us a Message</h3>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" name="txtName" class="form-control" placeholder="Your Name *" value="" />
              </div>
              <div class="form-group">
                <input type="text" name="txtEmail" class="form-control" placeholder="Your Email *" value="" />
              </div>
              <div class="form-group">
                <input type="text" name="txtPhone" class="form-control" placeholder="Your Phone Number *" value="" />
              </div>
              <div class="form-group">
                <input onclick="myFunction()" type="submit" name="btnSubmit" class="btnContact" value="Send Message" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <textarea name="txtMsg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>


@endsection

<script>
function myFunction() {
  alert("Thank you for your message. it has been sent");
}
</script>