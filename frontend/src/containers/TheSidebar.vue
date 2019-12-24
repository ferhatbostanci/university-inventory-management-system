<template>
  <CSidebar 
    fixed 
    :minimize="minimize"
    :show.sync="show"
  >
    <CSidebarBrand 
      :imgFull="{ width: 60, height: 50, alt: 'Logo', src: 'https://img.pngio.com/inventory-inventory-control-manufacturing-icon-with-png-and-inventory-png-512_453.png'}"
      :imgMinimized="{ width: 60, height: 50, alt: 'Logo', src: 'https://img.pngio.com/inventory-inventory-control-manufacturing-icon-with-png-and-inventory-png-512_453.png'}"
    />
    <CRenderFunction flat :content-to-render="nav"/>
    <CSidebarMinimizer
      class="d-md-down-none"
      @click.native="minimize = !minimize"
    />
  </CSidebar>
</template>

<script>
import nav from './_nav'

export default {
  name: 'TheSidebar',
  data () {
    return {
      minimize: false,
      nav,
      show: 'responsive'
    }
  },
  mounted () {
    this.$root.$on('toggle-sidebar', () => {
      const sidebarOpened = this.show === true || this.show === 'responsive'
      this.show = sidebarOpened ? false : 'responsive'
    })
    this.$root.$on('toggle-sidebar-mobile', () => {
      const sidebarClosed = this.show === 'responsive' || this.show === false
      this.show = sidebarClosed ? true : 'responsive'
    })
  }
}
</script>
