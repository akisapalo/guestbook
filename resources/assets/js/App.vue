<template>
  <div class="container">
    <nav class="navbar navbar-default">
      <ul class="nav navbar-nav">
        <li>
          <router-link to="/" class="nav-link">Home</router-link>
        </li>
        <li>
          <router-link to="/create" class="nav-link">Add Guest</router-link>
        </li>
        <li>
          <router-link to="/guests" class="nav-link">Guests</router-link>
        </li>
      </ul>
    </nav>
    <transition name="fade" mode="out-in">
      <router-view></router-view>
    </transition>
  </div>
</template>

<style>
    .fade-enter-active, .fade-leave-active {
      transition: opacity .5s
    }
    .fade-enter, .fade-leave-active {
      opacity: 0
    }
</style>

<script>

    export default{
    }
</script>