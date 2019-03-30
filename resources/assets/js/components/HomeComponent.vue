<template>
  <div class="row">
      <div class="col-md-8">
          <div class="panel panel-default">
              <div class="panel-heading">Home Component</div>

              <div class="panel-body">
                  I'm the Home Component component.
              </div>
          </div>
      </div>
  </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>