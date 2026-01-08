document.addEventListener("DOMContentLoaded", () => {

    const buttons = document.querySelectorAll('.ad-sidebar-button');
    const sections = document.querySelectorAll('.selecionar-sidebar');

    sections.forEach(section => section.style.display = 'none');

    const defaultSection = document.querySelector('.selecionar-sidebar[data-section="productos"]' );
    if (defaultSection) {
        defaultSection.style.display = 'block';
        cargarProductos(); 
    }

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const target = button.dataset.section;

            sections.forEach(section => {
                section.style.display =
                    section.dataset.section === target ? 'block' : 'none';
            });

            if (target === 'usuarios') {
                cargarUsuarios();
            } else if (target === 'productos') {
                cargarProductos();
            } else if (target === 'categorias') {
                cargarCategorias();
            } else if (target === 'pedidos') {
                cargarPedidos();
            }
            buttons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
        });
    });
});
