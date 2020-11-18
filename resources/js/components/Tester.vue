<template>
     <h1>Tester</h1>
    <div id="example-2">
        <!-- `greet` is the name of a method defined below -->
        <button v-on:click="greet">Greet</button>
    </div>
</template>

<script>
    export default {
        methods: {
            greet: function (event) {
                // `this` inside methods points to the Vue instance
                alert('Hello ' + this.name + '!')
                // `event` is the native DOM event
                if (event) {
                    alert(event.target.tagName)
                }
            }
        }
    }
</script>
