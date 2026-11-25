<article class="project-panel panel-assistant" id="demo-assistant" role="tabpanel" aria-labelledby="tab-assistant">
    <div class="project-info">
        <h3>Assistant</h3>
        <p>Painel que reúne pull requests do Bitbucket e branches locais sincronizadas por um cliente Electron. Um servidor MCP fornece os dados para relatórios de produção.</p>
        <ul class="stack" aria-label="Tecnologias do Assistant">
            <li>Laravel 13</li><li>Livewire</li><li>Electron</li><li>MCP</li>
        </ul>
        <a class="project-link" href="https://assistant.lucassc.dev">Abrir site do Assistant</a>
    </div>
    <div class="demo-window" aria-label="Demonstração do Assistant">
        <div class="window-bar"><strong>Pull requests</strong><span class="demo-tag">Demo</span></div>
        <div class="demo-body">
            <div class="assistant-filters">
                <label>Repositório
                    <select id="assistant-repository">
                        <option value="portal">portal-web</option>
                        <option value="api">integracoes-api</option>
                    </select>
                </label>
                <label>Status
                    <select id="assistant-status">
                        <option value="all">Todos</option>
                        <option value="merged">Integrado</option>
                        <option value="open">Em revisão</option>
                    </select>
                </label>
            </div>
            <p class="demo-meta" id="assistant-list-count" aria-live="polite"></p>
            <ul class="pr-list" id="assistant-pr-list"></ul>
            <button type="button" class="button demo-button" id="assistant-generate">Gerar resumo</button>
            <div class="demo-result" id="assistant-summary" role="status" hidden></div>
        </div>
    </div>
</article>
