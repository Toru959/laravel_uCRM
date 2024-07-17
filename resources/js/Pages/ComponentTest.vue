<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import Label from '@/Components/InputLabel.vue'
import Input from '@/Components/TextInput.vue'
</script>
<template>
    <GuestLayout>
        <InputLabel value="件名">タイトル</InputLabel>
        <TextInput modelValue="初期値が入ります"></TextInput>
    </GuestLayout>
</template> 