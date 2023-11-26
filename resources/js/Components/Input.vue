<template>
    <div class="d-flex " :class="isInline ? 'flex-row align-items-center gap-2' : 'flex-column'">
        <label :for="props.title">{{ lodash.capitalize(props.title) }}</label>
        <select @change="update" class="form-control rounded-2 form-control-sm" v-if="props.type == 'select'" value="bldfokvn " >
            <option selected disabled>{{ props.placeholder }}</option>
            <option :value="option" selected="false" v-for="option in props.options" :key="option" >{{ option }}</option>
        </select>
        <input @change="update" v-else-if="props.type == 'date'" :max="now" :id="props.title" :type="props.type" :placeholder="props.placeholder" class="form-control rounded-2 form-control-sm" :disabled="disabled">
        <textarea @change="update" style="resize: none;" rows="5" res v-else-if="props.type == 'textarea'" :max="now" :id="props.title" :type="props.type" :placeholder="props.placeholder" class="form-control rounded-2 form-control-sm" :disabled="disabled "></textarea>
        <input @input="update" :value="modelValue" v-else :id="props.title" :type="props.type" :placeholder="props.placeholder" class="form-control rounded-2 form-control-sm" :disabled="disabled">
        <p class="form-text">{{ props.hint }}</p>
    </div>
</template>

<script setup>
import lodash from 'lodash'
import dayjs from 'dayjs'

const now = dayjs().format('YYYY-MM-DD')

const props = defineProps(['modelValue','title','placeholder','full','isInline','options','hint','type','disabled'])
const emits = defineEmits(['update:modelValue'])

const update = function(e){
    emits('update:modelValue',e.target.value)
}

</script>
