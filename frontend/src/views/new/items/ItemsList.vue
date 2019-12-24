<template>
    <div>
        <CRow>
            <CCol lg="12">
                <CTableWrapper :items="list">
                    <template #header>
                        <CIcon name="cil-grid"/> Kayıtlı Demirbaş Listesi
                    </template>
                </CTableWrapper>
            </CCol>
        </CRow>
    </div>
</template>

<script>
    import CTableWrapper from '../base/Table.vue'
    import axios from 'axios'

    export default {
        name: 'ItemsList',
        components: { CTableWrapper },
        data () {
            return {
                list: []
            }
        },
        beforeCreate () {
            axios.get('http://slimapp.local/api/v1/items').then(response => {
                var array = response.data.slice(0);
                for (let i = array.length - 1; i > 0; i--) {
                    let j = Math.floor(Math.random() * (i + 1));
                    let temp = array[i];
                    array[i] = array[j];
                    array[j] = temp
                }
                this.list = array;
            });
        }
    }
</script>
