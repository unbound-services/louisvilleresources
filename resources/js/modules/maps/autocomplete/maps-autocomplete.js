import React from 'react';
import PlacesAutocomplete, {
  geocodeByAddress,
  getLatLng,
} from 'react-places-autocomplete';

// currently this class is mostly from the example for this componentphp 
class LocationSearchInput extends React.Component {
  constructor(props) {
    super(props);

    console.log('props',props)
    this.state = { address: props.value ? props.value : '',
        lat: props.lat ? props.lat : '',
        lng: props.lng ? props.lng : '',
        zipcode: props.zipcode ? props.zipcode : '' };
    this.handleChange = this.handleChange.bind(this)
    this.handleSelect = this.handleSelect.bind(this)
  }

  handleChange(address){
    this.setState({ address });
  };

  handleSelect(address){
      
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
  };

  render() {
    const { lat, lng, address, zipcode } = this.state;
    const { name } = this.props;
    return (
        <React.Fragment>
      <PlacesAutocomplete
        value={this.state.address}
        onChange={this.handleChange}
        onSelect={this.handleSelect}
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
      <input type='hidden' name={name} value={address} />
      <input type='hidden' name='latitude' value={lat} />
      <input type='hidden' name='zipcode' value={zipcode} />
      <input type='hidden' name='longitude' value={lng} />
      </React.Fragment>
    );
  }
}

export default LocationSearchInput