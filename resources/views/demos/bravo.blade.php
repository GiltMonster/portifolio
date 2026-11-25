<article class="project-panel panel-bravo" id="demo-bravo" role="tabpanel" aria-labelledby="tab-bravo" hidden>
    <div class="project-info">
        <h3>Bravo</h3>
        <p>Loja de carros para web e mobile, feita com Angular e Ionic. A API em Laravel atende autenticação, catálogo de veículos, carrinho e pedidos.</p>
        <ul class="stack" aria-label="Tecnologias do Bravo">
            <li>Angular</li><li>Ionic</li><li>Laravel 11</li><li>MySQL</li>
        </ul>
        <div class="project-links">
            <a class="project-link" href="https://github.com/GiltMonster/Bravo-front">Código front-end</a>
            <a class="project-link" href="https://github.com/GiltMonster/Bravo-backend">Código back-end</a>
        </div>
    </div>
    <div class="demo-window" aria-label="Demonstração do Bravo">
        <div class="window-bar"><strong>Bravo · Loja de carros</strong><span class="demo-tag">Demo</span></div>
        <div class="demo-body">
            <div class="bravo-categories" id="bravo-categories" aria-label="Categorias">
                <button type="button" data-category="all" aria-pressed="true">Todos</button>
                <button type="button" data-category="hatch" aria-pressed="false">Hatch</button>
                <button type="button" data-category="seda" aria-pressed="false">Sedã</button>
                <button type="button" data-category="suv" aria-pressed="false">SUV</button>
            </div>
            <ul class="product-grid" id="bravo-products"></ul>
            <div class="cart">
                <div class="cart-title"><h4>Carrinho</h4><span id="bravo-cart-count" aria-live="polite"></span></div>
                <ul id="bravo-cart-items" class="cart-items"></ul>
                <div class="cart-total">
                    <div><span>Total estimado</span><strong id="bravo-total">R$ 0,00</strong></div>
                    <button type="button" id="bravo-checkout" class="button demo-button" disabled>Simular reserva</button>
                </div>
            </div>
            <div class="demo-result" id="bravo-result" role="status" hidden></div>
        </div>
    </div>
</article>
