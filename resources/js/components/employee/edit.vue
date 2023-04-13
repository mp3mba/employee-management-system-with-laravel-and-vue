<template>
    <div>
        <div class="container mb-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Update Employee
                            <router-link :to="{name: 'EmployeesIndex'}" class="float-right">Go Back</router-link>
                        </div>
        
                        <div class="card-body">
                            <form @submit.prevent="updateEmployee()">
                                
                                <div class="form-group row mb-3">
                                    <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>
        
                                    <div class="col-md-6">
                                        <input 
                                            v-model="form.firstname"
                                            type="text"
                                            class="form-control"
                                            value="first_name"
                                        autofocus>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="middle_name" class="col-md-4 col-form-label text-md-right">Middle Name</label>
        
                                    <div class="col-md-6">
                                        <input 
                                            v-model="form.middletname"
                                            type="text"
                                            class="form-control"
                                            value="middle_name"
                                        autofocus>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>
        
                                    <div class="col-md-6">
                                        <input 
                                            v-model="form.lastname"
                                            type="text"
                                            class="form-control"
                                            value="last_name"
                                        autofocus>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
        
                                    <div class="col-md-6">
                                        <input 
                                            v-model="form.email"
                                            type="text"
                                            class="form-control"
                                            value="email"
                                        autofocus>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="zip_code" class="col-md-4 col-form-label text-md-right">Zip Code</label>
        
                                    <div class="col-md-6">
                                        <input 
                                            v-model="form.zip_code"
                                            type="text"
                                            class="form-control"
                                            value="zip_code"
                                        autofocus>
                                    </div>
                                </div>
        
                                <div class="form-group row mb-3">
                                    <label for="country_code" class="col-md-4 col-form-label text-md-right">Country</label>
        
                                    <div class="col-md-6">
                                        <select
                                           v-model="form.country_id"
                                           @change="getStates()"
                                           class="form-control"
                                           aria-label="Default select example"
                                        >

                                            <option
                                                v-for="country in countries"
                                                :key="country.id"
                                                :value="country.id">
                                                {{ country.name }}
                                            </option>
                                        </select>        
                                    </div>
                                </div>
        
                                <div class="form-group row mb-3">
                                    <label for="state" class="col-md-4 col-form-label text-md-right">State</label>
        
                                    <div class="col-md-6">
                                        <select
                                            v-model="form.state_id"
                                            @change="getCities()"
                                            class="form-control" 
                                            aria-label="Default select example">
                                                <option v-for="state in states" :key="state.id" :value="state.id">{{state.name}} </option>
                                        </select>        
                                    </div>
                                </div>
        
                                <div class="form-group row mb-3">
                                    <label for="department" class="col-md-4 col-form-label text-md-right">Department</label>
        
                                    <div class="col-md-6">
                                        <select
                                            v-model="form.department_id"
                                            class="form-control"
                                            aria-label="Default select example">

                                            <option
                                                v-for="department in departments"
                                                :key="department.id"
                                                :value="department.id">
                                                {{department.name}}
                                            </option>
                                          </select>        
                                    </div>
                                </div>
        
                                <div class="form-group row mb-3">
                                    <label for="city" class="col-md-4 col-form-label text-md-right">City</label>
        
                                    <div class="col-md-6">
                                        <select
                                            v-model="form.city_id"
                                            class="form-control" 
                                            aria-label="Default select example">
                                                <option 
                                                    v-for="city in cities"
                                                    :key="city.id" 
                                                    :value="city.id">
                                                    {{city.name}}
                                                </option>
                                        </select>        
                                    </div>
                                </div>
        
                                <div class="form-group row mb-3">
                                    <label for="city" class="col-md-4 col-form-label text-md-right">Birth Date</label>
        
                                    <div class="col-md-6">
                                        <datepicker
                                            v-model="form.birth_date"
                                            input-class="form-control"
                                        >
                                        </datepicker>       
                                    </div>
                                </div>
        
                                <div class="form-group row mb-3">
                                    <label for="city" class="col-md-4 col-form-label text-md-right">Date Hired</label>
        
                                    <div class="col-md-6">
                                        <datepicker
                                            v-model="form.hire_date"
                                            input-class="form-control"
                                         >
                                        </datepicker>       
                                    </div>
                                </div>
        
                                <div class="row mb-0 mt-4">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>      

    </div>
</template>

<script>
    import Datepicker from 'vuejs-datepicker';
    import moment from 'moment';
    export default{
        components: {
            Datepicker,
        },
        data(){
            return{
                countries: [],
                departments: [],
                states: [],
                cities: [],
                form: {
                    firstname: "",
                    middletname: "",
                    lastname: "",
                    email: "",
                    country_id: "",
                    department_id: "",
                    city_id: "",
                    zip_code: "",
                    state_id: "",
                    birth_date: null,
                    hire_date: null,
                },
            }
        },
        created(){
            this.getCountries();
            this.getDepartments();
            this.getEmployee();
        },
        methods: {
            getEmployee(){
                axios.get('/api/employees/' + this.$route.params.id)
                .then(res => {
                    this.form = res.data.data;
                    this.getStates();
                    this.getCities();
                })
                .catch(error => {
                    console.log(console.error)
                })
            },
            getCountries(){
                axios.get('/api/employees/countries')
                .then(res => {
                    this.countries = res.data
                })
                .catch(error => {
                    console.log(console.error)
                })
            },
            getStates(){
                axios.get("/api/employees/"+ this.form.country_id +"/states")
                .then(res => {
                    this.states = res.data
                })
                .catch(error => {
                    console.log(console.error)
                })
            },
            getCities(){
                axios.get("/api/employees/" + this.form.state_id + "/cities")
                .then(res => {
                    this.cities = res.data
                })
                .catch(error => {
                    console.log(console.error)
                })
            },
            getDepartments(){
                axios.get("/api/employees/departments")
                .then(res => {
                    this.departments = res.data
                })
                .catch(error => {
                    console.log(console.error)
                })
            },
            updateEmployee(){
                axios.put("/api/employees/" + this.$route.params.id, {
                    'firstname': this.form.firstname,
                    'middletname': this.form.middletname,
                    'lastname': this.form.lastname,
                    'email': this.form.email,
                    'country_id': this.form.country_id,
                    'state_id': this.form.state_id,
                    'city_id': this.form.city_id,
                    'department_id': this.form.department_id,
                    'zip_code': this.form.zip_code,
                    'birth_date': this.format_date(this.form.birth_date),
                    'hire_date': this.format_date(this.form.hire_date),
                })
                .then(res => {
                    this.$router.push({name: 'EmployeesIndex'});
                });
            },
            format_date(value){
                if(value){
                    return moment(String(value)).format('YYYYMMDD');
                }
            },
        },
    }
</script>
