import Autocomplete from "./modules/maps/autocomplete/maps-autocomplete";
import React from 'react';
import ReactDom from 'react-dom';


const el = document.querySelector('#replace-address-form');

ReactDom.render(<Autocomplete name='street_address'></Autocomplete>, el)
