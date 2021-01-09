/**
 * Created by HP ELITEBOOK 840 G5 on 1/6/2021.
 */

function closeInput(elm) {
  var td = elm.parentNode;
  var value = elm.value;
  td.removeChild(elm);
  td.innerHTML = value;

  const data = td.dataset;
  console.table(data);


  // Post Changes


  $.post('./commit',{'key':data.key,'name': data.name, 'no': data.no,'filterKey': data.filterField,'service': data.service, 'value': value }).done(function(msg){
    console.log(msg);
  });
}

function addInput(elm,type = false) {
  if (elm.getElementsByTagName('input').length > 0) return;

  var value = elm.innerHTML;
   elm.innerHTML = '';

  var input = document.createElement('input');
  if(type){
    input.setAttribute('type', type);
  }else{
    input.setAttribute('type', 'text');
  }

  input.setAttribute('value', value);
  input.setAttribute('class','form-control');
  input.setAttribute('onBlur', 'closeInput(this)');
  elm.appendChild(input);
  input.focus();
}

async function addDropDown(elm,resource) {
  if (elm.getElementsByTagName('input').length > 0) return;

  var value = elm.innerHTML;
  elm.innerHTML = '';

  const ddContent = await getData(resource);

  console.table(ddContent);


  var select = document.createElement('select');
  const InitialOption = document.createElement('option');

  InitialOption.innerText = 'Select ...';
  select.appendChild(InitialOption);

  // Prepare the returned data and append it on the select

  for(const[key, value] of Object.entries(ddContent)){
        // console.log(`${key}: ${value}`);
        const option = document.createElement('option');
        option.value = key;
        option.text = value;

        select.appendChild(option);
  }

  select.setAttribute('class','form-control');
  select.setAttribute('onChange', 'closeInput(this)');
  elm.appendChild(select);
  select.focus();
}


async function getData(resource)
{
  const res = await fetch(`./${resource}`,{
  headers: new Headers({
    Origin: 'http://localhost:2026/'
  })
});
  const data = await res.json();

  return data;
}





