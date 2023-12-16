<template>
    <PopUp v-if="showPopUp" :onClose="onClose" :onSubmit="() => onEdit(id,role)" v-model="role" type="select" :options="['admin','utilisateur']" title="modifier le role" />
    <div>
        <div class="d-flex w-full justify-content-between">
            <Header :level="3">{{ title }}</Header>
            <Input v-model="input" class="searchBar" type="text" placeholder="Recherche par nom"  />
            <slot></slot>
        </div>
    </div>
    <div class="max-h-[600px] overflow-y-scroll">
        <table class="table table-striped border text-center">
            <thead>
                <tr>
                    <th scope="col " v-for="atr in attr" :key="atr">{{ atr.toUpperCase() }}</th>
                    <th scope="col ">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="elem in filterdData" :key="elem">
                    <td scope="row" v-for="key in Object.keys(elem)" :key="key">{{ elem[key] }}</td>
                    
                    <td>
                        <div class="d-flex h-[20px] gap-2 justify-content-center align-items-center">
                            <i v-if="props.onEdit" @click="() => edit(elem.id)" class="fa-solid fa-pencil fa-lg" style="color: #000000;"></i>
                            <i v-if="props.delete" @click="() => data = props.delete(data,elem.id)" class="fa-solid fa-trash fa-lg" style="color: #000000;"></i>
                            <i v-if="props.accept" @click="() => data = accept(data,elem.id)" class="fa-solid fa-check fa-lg" style="color: #000000;"></i>
                            <i v-if="props.decline" @click="() => data = decline(data,elem.id)" class="fa-solid fa-x fa-lg" style="color: #000000;"></i>
                        </div>
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>
</template>

<script setup>
import Header from '@/Components/Header.vue'
import Input from '@/Components/Input.vue'
import PopUp from '@/Components/PopUp.vue'
import { computed, ref, watch } from 'vue'

const props = defineProps(['title','attr','onEdit','onSearch','data','delete','accept','decline','add'])
// defineProps(['onClose','onSubmit','modelValue','type','title','note','placeholder'])

const role = ref('')
const id = ref(null)
const showPopUp = ref(false)
const input = ref('')
const data = ref(props.data)

function edit(_id){
    console.log('edit here ? ')
    id.value = _id
    showPopUp.value = true
    console.log(showPopUp.value,id.value)
}

function onClose(){
    showPopUp.value = false
}

const filterdData = ref(props.data)
console.log(filterdData.value[0])
watch([input,data],() => {
    filterdData.value = props.onSearch(data.value, input.value)
    console.log(filterdData)
})
</script>

<style>

</style>