<?php if ($tasks === []): ?>
    <p class="empty">No tasks found.</p>
<?php else: ?>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <?php $statusClass = strtolower(str_replace(' ', '-', $task['status'])); ?>
                    <tr>
                        <td><?= esc($task['title']) ?></td>
                        <td><span class="status status-<?= esc($statusClass, 'attr') ?>"><?= esc(ucwords($task['status'])) ?></span></td>
                        <td><?= esc(date('M j, Y', strtotime($task['task_date']))) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>
