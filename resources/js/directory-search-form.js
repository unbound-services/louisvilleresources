
import React from 'react';
import ReactDom from 'react-dom';
import PlacesAutocomplete, {
  geocodeByAddress,
  getLatLng,
} from 'react-places-autocomplete';
import CommonSelect from './components/common/components-common-select.js';

const el = document.querySelector('.replace-address-form');
class SearchByLocation extends React.Component {
  constructor(props){
    super(props);
    this.state = {
      lat: '',
      lng: '',
      address: '',
      zipcode: '',
      radius: '',
      search: '',
      addressOpen: false,
    }

    this.handleSelect = this.handleSelect.bind(this);
    this.addressChange = this.addressChange.bind(this);
    this.clearAddress = this.clearAddress.bind(this);
  }

  componentDidMount(){
    if(window.localStorage.getItem('address')) {
      this.handleSelect(window.localStorage.getItem('address'))
      this.setState({addressOpen: true});
    }
  }

  handleSelect(address) {
    this.addressChange(address)
    geocodeByAddress(address)
      .then(results => {
          const parts = results[0].address_components;

        // grab the zipcode real quick
        for(let i=0;i<parts.length; i++){
            if(parts[i].types.indexOf('postal_code') > -1 ) {
                this.setState({ zipcode: parts[i].long_name})
            }
        }
        return getLatLng(results[0])
      })
      .then( latLng => this.setState(latLng) )
      .catch(error => console.error('Error', error));
  }
  addressChange(address){
    this.setState({address})
    window.localStorage.setItem('address', address);
  }
  clearAddress(){
    this.setState({address: '', lat: '', lng: '', zipcode: '', radius: ''});
    window.localStorage.setItem('address', '');
  }

  render(){
    const { lat, lng, address, zipcode, radius, search, addressOpen} = this.state;
    const storage = window.localStorage;

    // functions
    const onChange = e => {
      this.setState({[e.target.name]: e.target.value})
    }
    const toggle = () => {
      this.setState({addressOpen: !addressOpen});
    }

    // component parts
    let addressButton = (
      <div className="directory-search__expand-container">
        <button className="directory-search__expand" onClick={toggle}>{addressOpen ? '-' : '+'}</button>
        Show me what's close to me
      </div>
    )
    let addressBox = '';
    if(addressOpen) addressBox = (
      <div className="directory-search__address-box">
        <div className="directory-search__label directory-search__label--address">
          Your Address:
          <PlacesAutocomplete
            value={address}
            onChange={this.addressChange}
            onSelect={this.handleSelect}
          >
              {({ getInputProps, suggestions, getSuggestionItemProps, loading }) => (
                <div>
                  <input
                    {...getInputProps({
                      placeholder: 'Search Places ...',
                      className: 'directory-search__input',
                    })}
                  />
                  <div className="autocomplete-dropdown-container">
                    {loading && <div>Loading...</div>}
                    {suggestions.map(suggestion => {
                      const className = suggestion.active
                        ? 'suggestion-item--active'
                        : 'suggestion-item';
                      // inline style for demonstration purpose
                      const style = suggestion.active
                        ? { backgroundColor: '#fafafa', cursor: 'pointer' }
                        : { backgroundColor: '#ffffff', cursor: 'pointer' };
                      return (
                        <div
                          {...getSuggestionItemProps(suggestion, {
                            className,
                            style,
                          })}
                        >
                          <span>{suggestion.description}</span>
                        </div>
                      );
                    })}
                  </div>
                </div>
              )}
          </PlacesAutocomplete>
        </div>
        <div className="directory-search__label directory-search__label--radius">
          Distance from your address in miles:
          <CommonSelect
            name='radius'
            selected={radius}
            onChange={onChange}
            selectClass='directory-search__select'
          >
            <option className='common-select__option' key={1} value={1}>1 mile (walking distance)</option>
            <option className='common-select__option' key={2} value={5}>5 miles</option>
            <option className='common-select__option' key={3} value={10}>10 miles</option>
            <option className='common-select__option' key={4} value={20}>20 miles</option>
            <option className='common-select__option' key={5} value=''>Show me everything</option>
          </CommonSelect>
        </div>
        <button className="directory-search__clear-button" onClick={this.clearAddress}>Clear Address</button>
      </div>
    )
    return(
      <div className="directory-search">
        <div className='common-form-input common-form-input--text directory-search__label'>
            Search for a business:
            <input className='common-form-input__input common-form-input__input--text directory-search__input' type='text' name="search" onChange={onChange} />
        </div>
        {addressButton}
        {addressBox}
        <form className='directory-search__form' method='GET' action='/search'>
          <input type="hidden" name="search" value={search} />
          <input type="hidden" name="radius" value={radius} />
          <input type='hidden' name='latitude' value={lat} />
          <input type='hidden' name='zipcode' value={zipcode} />
          <input type='hidden' name='longitude' value={lng} />
          <input className='common-form-input__submit directory-search__submit' type="submit" value='Search' />
        </form>
      </div>

    )
  }
}
ReactDom.render(<SearchByLocation/>, el)
