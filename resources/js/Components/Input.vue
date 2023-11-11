<template>
    <div class="d-flex flex-column">
        <label :for="props.title">{{ lodash.capitalize(props.title) }}</label>
        <select @change="update" class="form-control rounded-2 form-control-sm" v-if="props.type == 'select'" value="bldfokvn " >
            <option selected disabled>{{ props.placeholder }}</option>
            <option :value="option" selected="false" v-for="option in props.options" :key="option" >{{ option }}</option>
        </select>
        <input @change="update" v-else-if="props.type == 'date'" :max="now" :id="props.title" :type="props.type" :placeholder="props.placeholder" class="form-control rounded-2 form-control-sm">
        <input @input="update" v-else :id="props.title" :type="props.type" :placeholder="props.placeholder" class="form-control rounded-2 form-control-sm">
        <p class="form-text">{{ props.hint }}</p>
    </div>
</template>

<script setup>
import lodash from 'lodash'
import dayjs from 'dayjs'

const now = dayjs().format('YYYY-MM-DD')

const props = defineProps(['modelValue','title','placeholder','options','hint','type'])
const emits = defineEmits(['update:modelValue'])

const update = function(e){
    emits('update:modelValue',e.target.value)
}

</script>
