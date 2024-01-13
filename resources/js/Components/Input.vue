<template>
    <div class="d-flex " :class="[isInline ? 'flex-row align-items-center gap-2' : 'flex-column',full ? 'w-100' : '']">
        <label :for="props.title">{{ lodash.capitalize(props.title) }}</label>
        <select @change="update" :disabled="disabled" class="form-control rounded-2 form-control-sm" :multiple="props.multiple" v-if="props.type == 'select'" >
            <option selected disabled>{{ props.placeholder }}</option>
            <option :value="option" :selected="option == modelValue" v-for="(option,index) in props.options" :key="option" >{{ props.labels[index] ? props.labels[index] : props.options[index] }}</option>
        </select>
        <input @change="update" v-else-if="props.type == 'date'" :max="now" :id="props.title" :type="props.type" :placeholder="props.placeholder" class="form-control rounded-2 form-control-sm" :disabled="disabled">
        <textarea @change="update" style="resize: none;" rows="5" res v-else-if="props.type == 'textarea'" :max="now" :value="modelValue" :id="props.title" :type="props.type" :placeholder="props.placeholder" class="form-control rounded-2 form-control-sm" :disabled="disabled "></textarea>
        <input @input="update" :value="modelValue" v-else :id="props.title" :type="props.type" :placeholder="props.placeholder" class="form-control rounded-2 form-control-sm" :disabled="disabled">
        <p class="form-text">{{ props.hint }}</p>
    </div>
</template>
select-multiple
<script setup>
import lodash from 'lodash'
import dayjs from 'dayjs'

const now = dayjs().format('YYYY-MM-DD')

if(props.type == 'select')
    console.log(props.options,props.modelValue)


const props = defineProps(['modelValue','title','placeholder','full','isInline','options','hint','type','disabled','multiple','labels'])
const emits = defineEmits(['update:modelValue'])

const update = function(e){
    emits('update:modelValue',e.target.value)
}

</script>
