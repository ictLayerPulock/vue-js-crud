<template>
    <div class="container py-5">
          <div class="bs-docs-section clearfix">
          <div class="row">
            <div class="col-lg-12">
              
  
              <div class="bs-component">
                <nav class="navbar navbar-default">
                  <div class="container-fluid">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="#">{{title}}</a>
                    </div>
  
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav">
                        <li class=""><router-link class="nav-link" to="/">Home</router-link></li>
                        <li><router-link class="px-5"  to="/contact-list">Contact List</router-link></li>
                        <li><router-link  to="add-contact">Add Contact</router-link></li>
                       
                      </ul>
                      
                    </div>
                  </div>
                </nav>
              </div>
  
            
  
            </div>
          </div>
        </div>
      </div>
  
  </template>
  
  
  <script >
  export default{
    name: 'Header',
    props:{
      title:String
    }
  }
  </script>