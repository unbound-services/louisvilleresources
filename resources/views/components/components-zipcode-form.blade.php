
<form method="post" action="/directory/zipcode-search" class="address-form">
  @csrf
  <label class="address-form__label">
    Your Address:
    <div id="replace-address-form">Please enable javascript</div>
  </label>
  <label class="address-form__label">
    Distance from your address:
    <input type="text" name="radius" class="address-form__input">
  </label>
  <input type="submit" value="Find Address">
</form>

<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_PUBLIC_KEY', '')}}&libraries=places"></script>
<script src="{{mix('js/zipcode-autocomplete.js')}}"></script>
