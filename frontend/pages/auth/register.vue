<template>
  <a-layout>
    <a-layout-content style="min-height: calc(100vh - 90px);">
      <a-row style="min-height: 80vh;" type="flex" align="middle" justify="center">
        <a-col xl="14" lg="14" sm="24" xs="24" md="16">
          <a-card title="Register">
            <a-form
              id="components-form-demo-normal-login"
              class="login-form"
              @submit.prevent="handleSubmit"
            >
              <a-form-item
                label="Name"
                :validate-status="errors.name ? 'error' : ''"
                :help="errors.name ? errors.name[0] : ''"
              >
                <a-input required v-model="form.name" placeholder="Please enter your name">
                  <a-icon slot="prefix" type="user" style="color: rgba(0,0,0,.25)"/>
                </a-input>
              </a-form-item>

              <a-form-item
                label="E-mail Address"
                :validate-status="errors.email ? 'error' : ''"
                :help="errors.email ? errors.email[0] : ''">
                <a-input required type="email" v-model="form.email" placeholder="Please enter your E-mail Address">
                  <a-icon slot="prefix" type="mail" style="color: rgba(0,0,0,.25)"/>
                </a-input>
              </a-form-item>

              <a-form-item
                label="Country"
                :validate-status="errors.country ? 'error' : ''"
                :help="errors.country ? errors.country[0] : ''">
                <a-select
                  required
                  showSearch
                  placeholder="Please select your country"
                  optionFilterProp="children"
                  :filterOption="filterOption"
                  v-model="form.country"
                >
                  <a-icon slot="suffixIcon" type="global"/>
                  <a-select-option v-for="country in form.countries" :value="country" :key="country">{{ country }}
                  </a-select-option>
                </a-select>
              </a-form-item>

              <a-form-item
                label="Password"
                :validate-status="errors.password ? 'error' : ''"
                :help="errors.password ? errors.password[0] : ''">
                <a-input required type="password" v-model="form.password" placeholder="Please enter your password">
                  <a-icon slot="prefix" type="lock" style="color: rgba(0,0,0,.25)"/>
                </a-input>
              </a-form-item>

              <a-form-item
                label="Confirm Password"
                :validate-status="errors.password_confirmation ? 'error' : ''"
                :help="errors.password_confirmation ? errors.password_confirmation[0] : ''">
                <a-input required type="password" v-model="form.password_confirmation"
                         placeholder="Please confirm your password">
                  <a-icon slot="prefix" type="lock" style="color: rgba(0,0,0,.25)"/>
                </a-input>
              </a-form-item>

              <a-form-item>
                <n-link to="/auth/login">
                  Already got a user? Sign in here
                </n-link>
                <a class="login-form-forgot" href="">
                  Forgot password
                </a>
                <a-button v-on:click="handleSubmit" type="primary" html-type="submit" class="login-form-button">
                  Sign Up
                </a-button>
              </a-form-item>
            </a-form>
          </a-card>
        </a-col>
      </a-row>
    </a-layout-content>
  </a-layout>
</template>
<script>
  export default {
    data() {
      return {
        errors: [],
        form: {
          name: '',
          email: '',
          password: '',
          password_confirmation: '',
          country: '',
          countries: [
            "Afghanistan",
            "Albania",
            "Algeria",
            "American Samoa",
            "Andorra",
            "Angola",
            "Anguilla",
            "Antarctica",
            "Antigua and Barbuda",
            "Argentina",
            "Armenia",
            "Aruba",
            "Australia",
            "Austria",
            "Azerbaijan",
            "Bahamas (the)",
            "Bahrain",
            "Bangladesh",
            "Barbados",
            "Belarus",
            "Belgium",
            "Belize",
            "Benin",
            "Bermuda",
            "Bhutan",
            "Bolivia (Plurinational State of)",
            "Bonaire, Sint Eustatius and Saba",
            "Bosnia and Herzegovina",
            "Botswana",
            "Bouvet Island",
            "Brazil",
            "British Indian Ocean Territory (the)",
            "Brunei Darussalam",
            "Bulgaria",
            "Burkina Faso",
            "Burundi",
            "Cabo Verde",
            "Cambodia",
            "Cameroon",
            "Canada",
            "Cayman Islands (the)",
            "Central African Republic (the)",
            "Chad",
            "Chile",
            "China",
            "Christmas Island",
            "Cocos (Keeling) Islands (the)",
            "Colombia",
            "Comoros (the)",
            "Congo (the Democratic Republic of the)",
            "Congo (the)",
            "Cook Islands (the)",
            "Costa Rica",
            "Croatia",
            "Cuba",
            "Curaçao",
            "Cyprus",
            "Czechia",
            "Côte d'Ivoire",
            "Denmark",
            "Djibouti",
            "Dominica",
            "Dominican Republic (the)",
            "Ecuador",
            "Egypt",
            "El Salvador",
            "Equatorial Guinea",
            "Eritrea",
            "Estonia",
            "Eswatini",
            "Ethiopia",
            "Falkland Islands (the) [Malvinas]",
            "Faroe Islands (the)",
            "Fiji",
            "Finland",
            "France",
            "French Guiana",
            "French Polynesia",
            "French Southern Territories (the)",
            "Gabon",
            "Gambia (the)",
            "Georgia",
            "Germany",
            "Ghana",
            "Gibraltar",
            "Greece",
            "Greenland",
            "Grenada",
            "Guadeloupe",
            "Guam",
            "Guatemala",
            "Guernsey",
            "Guinea",
            "Guinea-Bissau",
            "Guyana",
            "Haiti",
            "Heard Island and McDonald Islands",
            "Holy See (the)",
            "Honduras",
            "Hong Kong",
            "Hungary",
            "Iceland",
            "India",
            "Indonesia",
            "Iran (Islamic Republic of)",
            "Iraq",
            "Ireland",
            "Isle of Man",
            "Israel",
            "Italy",
            "Jamaica",
            "Japan",
            "Jersey",
            "Jordan",
            "Kazakhstan",
            "Kenya",
            "Kiribati",
            "Korea (the Democratic People's Republic of)",
            "Korea (the Republic of)",
            "Kuwait",
            "Kyrgyzstan",
            "Lao People's Democratic Republic (the)",
            "Latvia",
            "Lebanon",
            "Lesotho",
            "Liberia",
            "Libya",
            "Liechtenstein",
            "Lithuania",
            "Luxembourg",
            "Macao",
            "Madagascar",
            "Malawi",
            "Malaysia",
            "Maldives",
            "Mali",
            "Malta",
            "Marshall Islands (the)",
            "Martinique",
            "Mauritania",
            "Mauritius",
            "Mayotte",
            "Mexico",
            "Micronesia (Federated States of)",
            "Moldova (the Republic of)",
            "Monaco",
            "Mongolia",
            "Montenegro",
            "Montserrat",
            "Morocco",
            "Mozambique",
            "Myanmar",
            "Namibia",
            "Nauru",
            "Nepal",
            "Netherlands (the)",
            "New Caledonia",
            "New Zealand",
            "Nicaragua",
            "Niger (the)",
            "Nigeria",
            "Niue",
            "Norfolk Island",
            "Northern Mariana Islands (the)",
            "Norway",
            "Oman",
            "Pakistan",
            "Palau",
            "Palestine, State of",
            "Panama",
            "Papua New Guinea",
            "Paraguay",
            "Peru",
            "Philippines (the)",
            "Pitcairn",
            "Poland",
            "Portugal",
            "Puerto Rico",
            "Qatar",
            "Republic of North Macedonia",
            "Romania",
            "Russian Federation (the)",
            "Rwanda",
            "Réunion",
            "Saint Barthélemy",
            "Saint Helena, Ascension and Tristan da Cunha",
            "Saint Kitts and Nevis",
            "Saint Lucia",
            "Saint Martin (French part)",
            "Saint Pierre and Miquelon",
            "Saint Vincent and the Grenadines",
            "Samoa",
            "San Marino",
            "Sao Tome and Principe",
            "Saudi Arabia",
            "Senegal",
            "Serbia",
            "Seychelles",
            "Sierra Leone",
            "Singapore",
            "Sint Maarten (Dutch part)",
            "Slovakia",
            "Slovenia",
            "Solomon Islands",
            "Somalia",
            "South Africa",
            "South Georgia and the South Sandwich Islands",
            "South Sudan",
            "Spain",
            "Sri Lanka",
            "Sudan (the)",
            "Suriname",
            "Svalbard and Jan Mayen",
            "Sweden",
            "Switzerland",
            "Syrian Arab Republic",
            "Taiwan (Province of China)",
            "Tajikistan",
            "Tanzania, United Republic of",
            "Thailand",
            "Timor-Leste",
            "Togo",
            "Tokelau",
            "Tonga",
            "Trinidad and Tobago",
            "Tunisia",
            "Turkey",
            "Turkmenistan",
            "Turks and Caicos Islands (the)",
            "Tuvalu",
            "Uganda",
            "Ukraine",
            "United Arab Emirates (the)",
            "United Kingdom of Great Britain and Northern Ireland (the)",
            "United States Minor Outlying Islands (the)",
            "United States of America (the)",
            "Uruguay",
            "Uzbekistan",
            "Vanuatu",
            "Venezuela (Bolivarian Republic of)",
            "Viet Nam",
            "Virgin Islands (British)",
            "Virgin Islands (U.S.)",
            "Wallis and Futuna",
            "Western Sahara",
            "Yemen",
            "Zambia",
            "Zimbabwe",
            "Åland Islands"
          ]
        },
      }
    },
    methods: {
      filterOption(input, option) {
        return (
          option.componentOptions.children[0].text.toLowerCase().indexOf(input.toLowerCase()) >= 0
        );
      },
      async handleSubmit(e) {
        try {
          e.preventDefault();
          let errors = [];

          console.log(this.form)
          await this.$axios.$get('sanctum/csrf-cookie');
          await this.$axios.post('/api/register', {
            name: this.form.name,
            email: this.form.email,
            password: this.form.password,
            password_confirmation: this.form.password_confirmation,
            country: this.form.country
          }).then(function (resp) {

          }).catch(function (err) {
            if (err.response.status = 422) {
              errors = err.response.data.errors;
            }
          });

          await this.$auth.loginWith('local', {
            data: {
              email: this.form.email,
              password: this.form.password
            }
          });

          this.errors = errors;
        } catch (e) {
          console.log(e)
        }
      }
    }
  }
</script>
<style>

  #components-form-demo-normal-login .login-form-forgot {
    float: right;
  }

  #components-form-demo-normal-login .login-form-button {
    width: 100%;
  }
</style>
