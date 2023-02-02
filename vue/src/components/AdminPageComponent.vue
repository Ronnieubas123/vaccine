<template>
    <main>
      <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <!-- Replace with your content -->
        <div class="px-4 py-6 sm:px-0">
          <slot></slot>
        </div>
        <!-- /End replace -->
      </div>    
    </main>
</template>
<script setup>
    const props = defineProps({
        title: String
    })

</script>
<style>
</style>