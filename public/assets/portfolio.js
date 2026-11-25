const byId = (id) => document.getElementById(id);

function showResult(element, message) {
    element.textContent = message;
    element.hidden = !message;
}

function setupTabs() {
    const tabs = Array.from(document.querySelectorAll('[role="tab"][data-project]'));

    function select(tab) {
        for (const candidate of tabs) {
            const active = candidate === tab;
            candidate.setAttribute('aria-selected', String(active));
            candidate.tabIndex = active ? 0 : -1;
            byId(candidate.getAttribute('aria-controls')).hidden = !active;
        }
    }

    for (const tab of tabs) {
        tab.addEventListener('click', () => select(tab));
        tab.addEventListener('keydown', (event) => {
            const index = tabs.indexOf(tab);
            const keys = {
                ArrowLeft: (index - 1 + tabs.length) % tabs.length,
                ArrowRight: (index + 1) % tabs.length,
                Home: 0,
                End: tabs.length - 1,
            };
            if (!Object.hasOwn(keys, event.key)) return;

            event.preventDefault();
            const next = tabs[keys[event.key]];
            select(next);
            next.focus();
        });
    }

    select(tabs[0]);
}

function setupAssistant() {
    const repositories = {
        portal: [
            { id: 48, title: 'Validação de endereço no checkout', branch: 'feature/checkout', status: 'merged' },
            { id: 47, title: 'Ajuste no cálculo de frete', branch: 'fix/frete', status: 'merged' },
            { id: 46, title: 'Filtro no histórico de pedidos', branch: 'feature/pedidos', status: 'open' },
        ],
        api: [
            { id: 29, title: 'Sincronização de catálogos', branch: 'feature/catalogos', status: 'merged' },
            { id: 28, title: 'Limite de tentativas em webhooks', branch: 'feature/webhooks', status: 'open' },
            { id: 27, title: 'Padronização de logs de integração', branch: 'refactor/logs', status: 'open' },
        ],
    };
    const labels = { merged: 'Integrado', open: 'Em revisão' };
    const repository = byId('assistant-repository');
    const status = byId('assistant-status');
    const list = byId('assistant-pr-list');
    const count = byId('assistant-list-count');
    const summary = byId('assistant-summary');

    function selectedPullRequests() {
        const pullRequests = repositories[repository.value] ?? [];
        return pullRequests.filter((pr) => status.value === 'all' || pr.status === status.value);
    }

    function render() {
        const items = selectedPullRequests();
        count.textContent = items.length === 1 ? '1 pull request' : `${items.length} pull requests`;
        list.innerHTML = items.map(({ id, title, branch, status: state }) => `
            <li class="pr-item">
                <div><strong><span class="pr-number">#${id}</span> ${title}</strong><code>${branch}</code></div>
                <span class="pill pill-${state}">${labels[state]}</span>
            </li>`).join('') || '<li class="demo-empty">Nenhum pull request para esse filtro.</li>';
        showResult(summary, '');
    }

    repository.addEventListener('change', render);
    status.addEventListener('change', render);
    byId('assistant-generate').addEventListener('click', () => {
        const items = selectedPullRequests();
        const merged = items.filter((pr) => pr.status === 'merged');
        const reviewing = items.length - merged.length;
        if (items.length === 0) {
            showResult(summary, 'Resumo simulado. Nenhum pull request corresponde aos filtros.');
            return;
        }

        const titles = merged.map((pr) => `#${pr.id} ${pr.title}`).join(' · ');
        const result = `Resumo simulado. ${merged.length} em produção, ${reviewing} em revisão.`;
        showResult(summary, titles ? `${result} Em produção: ${titles}.` : result);
    });

    render();
}

function setupBravo() {
    const products = [
        { id: 'argo', category: 'hatch', name: 'Fiat Argo', price: 7490000 },
        { id: 'civic', category: 'seda', name: 'Honda Civic', price: 11590000 },
        { id: 'renegade', category: 'suv', name: 'Jeep Renegade', price: 10390000 },
    ];
    const money = new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' });
    const categories = byId('bravo-categories');
    const gallery = byId('bravo-products');
    const items = byId('bravo-cart-items');
    const count = byId('bravo-cart-count');
    const total = byId('bravo-total');
    const checkout = byId('bravo-checkout');
    const result = byId('bravo-result');
    const quantities = new Map();
    let reservationNumber = 1;

    function renderProducts(category) {
        const visible = products.filter((product) => category === 'all' || category === product.category);
        gallery.innerHTML = visible.map(({ id, category: type, name, price }) => `
            <li class="product-card">
                <div class="product-art art-${type}" aria-hidden="true">
                    <span class="car-illustration"><i></i></span>
                </div>
                <div class="product-copy">
                    <strong>${name}</strong>
                    <div><span>${money.format(price / 100)}</span>
                        <button class="product-add" type="button" data-add="${id}" aria-label="Adicionar ${name} ao carrinho">+</button>
                    </div>
                </div>
            </li>`).join('');
    }

    function renderCart() {
        const entries = products.filter((product) => quantities.has(product.id));
        let quantity = 0;
        let subtotal = 0;

        items.innerHTML = entries.map((product) => {
            const units = quantities.get(product.id);
            quantity += units;
            subtotal += units * product.price;
            return `<li class="cart-item">
                <span>${product.name}</span>
                <div class="cart-quantity">
                    <button type="button" data-cart="${product.id}" data-delta="-1" aria-label="Remover uma unidade de ${product.name}">−</button>
                    <span>${units}</span>
                    <button type="button" data-cart="${product.id}" data-delta="1" aria-label="Adicionar uma unidade de ${product.name}">+</button>
                </div>
            </li>`;
        }).join('') || '<li class="demo-empty">Adicione um veículo para simular uma reserva.</li>';

        count.textContent = quantity === 1 ? '1 veículo' : `${quantity} veículos`;
        total.textContent = money.format(subtotal / 100);
        checkout.disabled = quantity === 0;
    }

    function changeQuantity(id, delta) {
        const quantity = (quantities.get(id) ?? 0) + delta;
        if (quantity < 1) quantities.delete(id);
        else quantities.set(id, quantity);

        showResult(result, '');
        renderCart();
    }

    categories.addEventListener('click', (event) => {
        const button = event.target.closest('button[data-category]');
        if (!button) return;

        for (const candidate of categories.querySelectorAll('button')) {
            candidate.setAttribute('aria-pressed', String(candidate === button));
        }
        renderProducts(button.dataset.category);
    });

    gallery.addEventListener('click', (event) => {
        const button = event.target.closest('button[data-add]');
        if (button) changeQuantity(button.dataset.add, 1);
    });

    items.addEventListener('click', (event) => {
        const button = event.target.closest('button[data-cart]');
        if (!button) return;

        const { cart, delta } = button.dataset;
        changeQuantity(cart, Number(delta));
        const target = items.querySelector(`[data-cart="${cart}"][data-delta="${delta}"]`);
        (target ?? gallery.querySelector('button')).focus();
    });

    checkout.addEventListener('click', () => {
        const number = String(reservationNumber).padStart(3, '0');
        reservationNumber += 1;
        showResult(result, `Reserva simulada #${number}. Valor estimado de ${total.textContent}.`);
        quantities.clear();
        renderCart();
        result.tabIndex = -1;
        result.focus();
    });

    renderProducts('all');
    renderCart();
}

function setupEnsino() {
    const students = {
        rafaela: 'Rafaela Moraes',
        daniel: 'Daniel Lima',
        julia: 'Júlia Campos',
        leo: 'Léo Almeida',
    };
    const courses = {
        php: 'PHP e MySQL',
        web: 'Desenvolvimento Web',
        qualidade: 'Qualidade de Software',
    };
    const enrollments = [
        { student: 'rafaela', course: 'php' },
        { student: 'daniel', course: 'qualidade' },
    ];
    const search = byId('ensino-search');
    const student = byId('ensino-student');
    const course = byId('ensino-course');
    const list = byId('ensino-list');
    const result = byId('ensino-result');
    const normalize = (value) => value.normalize('NFD').replace(/\p{Diacritic}/gu, '').toLowerCase().trim();

    for (const [field, options] of [[student, students], [course, courses]]) {
        field.add(new Option('Selecione', '', true, true));
        for (const [id, label] of Object.entries(options)) field.add(new Option(label, id));
    }

    function render() {
        const query = normalize(search.value);
        const visible = enrollments.filter((item) => normalize(`${students[item.student]} ${courses[item.course]}`).includes(query));
        list.innerHTML = visible.map((item) => `
            <tr><th scope="row">${students[item.student]}</th><td>${courses[item.course]}</td></tr>
        `).join('') || '<tr><td colspan="2" class="demo-empty">Nenhuma matrícula encontrada.</td></tr>';
    }

    search.addEventListener('input', render);
    byId('ensino-form').addEventListener('submit', (event) => {
        event.preventDefault();
        const studentId = student.value;
        const courseId = course.value;
        if (!Object.hasOwn(students, studentId) || !Object.hasOwn(courses, courseId)) return;

        const duplicate = enrollments.some((item) => item.student === studentId && item.course === courseId);
        if (duplicate) {
            showResult(result, `${students[studentId]} já está matriculado em ${courses[courseId]}.`);
            return;
        }

        enrollments.unshift({ student: studentId, course: courseId });
        search.value = '';
        render();
        showResult(result, `Matrícula simulada de ${students[studentId]} em ${courses[courseId]} criada.`);
    });

    render();
}

console.log(
    '%c' + String.raw`
   /\_/\       .------------.
  ( o.o )      | >_         |
   > ^ <       '------------'
                 /________\

  Achou o gato do deploy.
  Se veio pelo código, considere isso um code review informal.
`,
    'color:#191823; background:#e4fa6c; font:700 13px monospace;',
);

setupTabs();
setupAssistant();
setupBravo();
setupEnsino();
