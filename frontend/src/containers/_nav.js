export default [
  {
    _name: 'CSidebarNav',
    _children: [
      {
        _name: 'CSidebarNavItem',
        name: 'Ana Sayfa',
        to: '/',
        icon: 'cil-speedometer',
        /*badge: {
          color: 'primary',
          text: 'NEW'
        }*/
      },
      {
        _name: 'CSidebarNavTitle',
        _children: ['Envanter']
      },
      {
        _name: 'CSidebarNavItem',
        name: 'Demirbaşları Listele',
        to: '/items/list',
        icon: 'cil-drop'
      },
      {
        _name: 'CSidebarNavItem',
        name: 'Demirbaş Ekle',
        to: '/items/add',
        icon: 'cil-drop'
      },
      {
        _name: 'CSidebarNavTitle',
        _children: ['KİRALAMA']
      },
      {
        _name: 'CSidebarNavItem',
        name: 'Geçmişi Listele',
        to: '/rental/list',
        icon: 'cil-drop'
      },
      {
        _name: 'CSidebarNavItem',
        name: 'Kayıt Oluştur',
        to: '/rental/add',
        icon: 'cil-drop'
      },
    ]
  }
]