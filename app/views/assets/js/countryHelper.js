const countryHelper = {
  url: 'https://restcountries.com/v3.1/lang/spa',
  select: document.getElementById('inputCountry'),
  codeNodeList: document.querySelectorAll('div[data-code]'),

  get: async () => {
    const fetchResponse = await fetch('https://restcountries.com/v3.1/lang/spa');

    if (fetchResponse.status == 200) {
      const response = await fetchResponse.json();
      const formatResponse = response.map(({ name, cca2 }) => ({ name: name.nativeName.spa.common, code: cca2 })).sort((a, b) => (a.name > b.name ? 1 : -1));
      return formatResponse;
    }
    else {
      return localCountries;
    }
  },

  buildOptions: async () => {
    const { select } = countryHelper;

    if (!select) return;

    const countries = await countryHelper.get();
    const dataCode = select.dataset.code;

    select.disabled = true;

    countries.forEach(({ code, name }) => {
      const option = document.createElement("option");
      option.text = name;
      option.value = code;
      option.selected = (code == dataCode);
      select.appendChild(option);
    });

    select.disabled = false;
  },

  replaceCodes: async () => {
    const { codeNodeList } = countryHelper;

    if (!codeNodeList) return;

    const countries = await countryHelper.get();

    [...codeNodeList].forEach(e => {
      const countryObj = countries.find( ({ code }) => code === e.dataset.code );
      e.innerHTML = countryObj ? countryObj.name : e.innerHTML;
    });
  },

  initialize: () => {
    countryHelper.buildOptions();
    countryHelper.replaceCodes();
  },
}

const localCountries = [
  {
    "name": "Argentina",
    "code": "AR"
  },
  {
    "name": "Belice",
    "code": "BZ"
  },
  {
    "name": "Bolivia",
    "code": "BO"
  },
  {
    "name": "Chile",
    "code": "CL"
  },
  {
    "name": "Colombia",
    "code": "CO"
  },
  {
    "name": "Costa Rica",
    "code": "CR"
  },
  {
    "name": "Cuba",
    "code": "CU"
  },
  {
    "name": "Ecuador",
    "code": "EC"
  },
  {
    "name": "El Salvador",
    "code": "SV"
  },
  {
    "name": "España",
    "code": "ES"
  },
  {
    "name": "Guam",
    "code": "GU"
  },
  {
    "name": "Guatemala",
    "code": "GT"
  },
  {
    "name": "Guinea Ecuatorial",
    "code": "GQ"
  },
  {
    "name": "Honduras",
    "code": "HN"
  },
  {
    "name": "México",
    "code": "MX"
  },
  {
    "name": "Nicaragua",
    "code": "NI"
  },
  {
    "name": "Panamá",
    "code": "PA"
  },
  {
    "name": "Paraguay",
    "code": "PY"
  },
  {
    "name": "Perú",
    "code": "PE"
  },
  {
    "name": "Puerto Rico",
    "code": "PR"
  },
  {
    "name": "República Dominicana",
    "code": "DO"
  },
  {
    "name": "Sahara Occidental",
    "code": "EH"
  },
  {
    "name": "Uruguay",
    "code": "UY"
  },
  {
    "name": "Venezuela",
    "code": "VE"
  }
];

document.addEventListener("DOMContentLoaded", () => {
  countryHelper.initialize();
});
