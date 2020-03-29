import Autocomplete from "./modules/maps/autocomplete/maps-autocomplete";
import React from 'react';
import ReactDom from 'react-dom';


const el = document.querySelector('.replace-address-form');
class SearchByLocation extends React.Component {
  constructor(props){
    super(props)
  }
  render(){
    return(
      <React.Fragment>
        <label className="address-form__label">
          Your Address:
          <Autocomplete name='street_address'></Autocomplete>
        </label>
        <label className="address-form__label">
          Distance from your address:
          <input type="text" name="radius" className="address-form__input"/>
        </label>
      </React.Fragment>
    )
  }
}
ReactDom.render(<SearchByLocation/>, el)
