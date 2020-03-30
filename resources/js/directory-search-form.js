
import React from 'react';
import ReactDom from 'react-dom';
import PlacesAutocomplete, {
  geocodeByAddress,
  getLatLng,
} from 'react-places-autocomplete';

const el = document.querySelector('.replace-address-form');
class SearchByLocation extends React.Component {
  constructor(props){
    super(props);
    this.state = {
      lat: '',
      lng: '',
      address: '',
      zipcode: '',
    }
  }

  render(){
    const { lat, lng, address, zipcode } = this.state;

    const handleChange = (newAddress) => {
      this.setState({'address': newAddress});
    }

    const handleSelect = (address) => {
      this.setState({address});
      geocodeByAddress(address)
        .then(results => {
            console.log('results', results[0])
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

    return(
      <div className="directory-search">
        <form className='directory-search__form' method='GET' action='/search'>
          <label className='common-form-input common-form-input--text'>
              <span className='common-form-input__label  directory-search__label'>Search for a business:</span>
              <input className='common-form-input__input common-form-input__input--text directory-search__input' type='text' name="search" />
          </label>
          <label className="directory-search__label">
            Distance from your address:
            <input type="text" name="radius" className="directory-search__input"/>
          </label>
          <input type='hidden' name='latitude' value={lat} />
          <input type='hidden' name='zipcode' value={zipcode} />
          <input type='hidden' name='longitude' value={lng} />
          <input className='common-form-input__submit search__submit' type="submit" value='Search'/>
        </form>
        <div className="directory-search__label">
          Your Address:
          <PlacesAutocomplete
            value={address}
            onChange={handleChange}
            onSelect={handleSelect}
          >
              {({ getInputProps, suggestions, getSuggestionItemProps, loading }) => (
                <div>
                  <input
                    {...getInputProps({
                      placeholder: 'Search Places ...',
                      className: 'location-search-input',
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
      </div>

    )
  }
}
ReactDom.render(<SearchByLocation/>, el)
