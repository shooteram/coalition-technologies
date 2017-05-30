<template>
    <div id="app">
        <nav class="navbar navbar-fixed-top navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <router-link :to="{ name: 'home' }" class="navbar-brand">{{ app_name }}</router-link>
                </div>
            </div>
        </nav>

        <div class="container">
            <transition name="fade" mode="out-in">
                <router-view></router-view>
            </transition>
        </div>
    </div>
</template>

<script>
export default {
    name: 'app',
    data: () => ({
        'app_name': window.Global.app_name
    })
}
</script>
