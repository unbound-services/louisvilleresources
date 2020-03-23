import Autocomplete from "./modules/maps/autocomplete/maps-autocomplete";
import React from 'react';
import ReactDom from 'react-dom';


const el = document.querySelector('.replace-places');
const currentVal = el.dataset.address
const lat = el.dataset.lat;
const lng = el.dataset.lng;
const zipcode = el.dataset.zipcode
ReactDom.render(<Autocomplete name='street_address' 
    value={currentVal}
    zipcode={zipcode}
    lat={lat}
    lng={lng} ></Autocomplete>, el  )