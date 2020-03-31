
import React from 'react';
import ReactDom from 'react-dom';

const CommonSelect = (props) => {
  const {name, selected, onChange,  options = [],  selectClass = '', optionClass = '', selectedOptionClass = ''} = props;
  let optionList =  options.map((e, i)=>{
    const optionClasses = e==selected ? optionClass+' '+selectedOptionClass : optionClass;
    return (
      <option key={i} value={e} className={`common-select__option ${optionClasses}`}>{e}</option>
    )
  })
  if(props.children) optionList = props.children;
  return (
    <select name={name} className={`common-select ${selectClass}`} onChange={onChange} value={selected}>
      {optionList}
    </select>
  )
}

export default CommonSelect;
