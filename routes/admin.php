<?php

use App\Http\Controllers\API\Admin\AppointmentScheduleController;
use App\Http\Controllers\API\Admin\AppointmentSlotController;
use App\Http\Controllers\API\Admin\AuthController;
use App\Http\Controllers\API\Admin\BlogController;
use App\Http\Controllers\API\Admin\ChatGroupController;
use App\Http\Controllers\API\Admin\ChatMessageController;
use App\Http\Controllers\API\Admin\CommentController;
use App\Http\Controllers\API\Admin\CustomerController;
use App\Http\Controllers\API\Admin\DepartmentsController;
use App\Http\Controllers\API\Admin\EncounterController;
use App\Http\Controllers\API\Admin\EnterpriseController;
use App\Http\Controllers\API\Admin\EventController;
use App\Http\Controllers\API\Admin\MasterController;
use App\Http\Controllers\API\Admin\MedicationController;
use App\Http\Controllers\API\Admin\NoteController;
use App\Http\Controllers\API\Admin\OrderController;
use App\Http\Controllers\API\Admin\OrderItemController;
use App\Http\Controllers\API\Admin\PatientController;
use App\Http\Controllers\API\Admin\PermissionController;
use App\Http\Controllers\API\Admin\PlanController;
use App\Http\Controllers\API\Admin\RoleController;
use App\Http\Controllers\API\Admin\TaskController;
use App\Http\Controllers\API\Admin\ToDoController;
use App\Http\Controllers\API\Admin\UserController;
use App\Http\Controllers\API\Admin\UserRoleController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum', 'validate.user']], function () {
    Route::post('order-items', [OrderItemController::class, 'store'])
        ->name('orderItem.store')
        ->middleware(['permission:create_orderitem']);
    Route::get('order-items', [OrderItemController::class, 'index'])
        ->name('order-items.index')
        ->middleware(['permission:read_orderitem']);
    Route::get('order-items/{orderItem}', [OrderItemController::class, 'show'])
        ->name('orderItem.show')
        ->middleware(['permission:read_orderitem']);
    Route::put('order-items/{orderItem}', [OrderItemController::class, 'update'])
        ->name('orderItem.update')
        ->middleware(['permission:update_orderitem']);
    Route::delete('order-items/{orderItem}', [OrderItemController::class, 'delete'])
        ->name('orderItem.delete')
        ->middleware(['permission:delete_orderitem']);
    Route::post('order-items/bulk-create', [OrderItemController::class, 'bulkStore'])
        ->name('orderItem.store.bulk')
        ->middleware(['permission:create_orderitem']);
    Route::post('order-items/bulk-update', [OrderItemController::class, 'bulkUpdate'])
        ->name('orderItem.update.bulk')
        ->middleware(['permission:update_orderitem']);

    Route::post('patients', [PatientController::class, 'store'])
        ->name('patient.store')
        ->middleware(['permission:create_patient']);
    Route::get('patients', [PatientController::class, 'index'])
        ->name('patients.index')
        ->middleware(['permission:read_patient']);
    Route::get('patients/{patient}', [PatientController::class, 'show'])
        ->name('patient.show')
        ->middleware(['permission:read_patient']);
    Route::put('patients/{patient}', [PatientController::class, 'update'])
        ->name('patient.update')
        ->middleware(['permission:update_patient']);
    Route::delete('patients/{patient}', [PatientController::class, 'delete'])
        ->name('patient.delete')
        ->middleware(['permission:delete_patient']);
    Route::post('patients/bulk-create', [PatientController::class, 'bulkStore'])
        ->name('patient.store.bulk')
        ->middleware(['permission:create_patient']);
    Route::post('patients/bulk-update', [PatientController::class, 'bulkUpdate'])
        ->name('patient.update.bulk')
        ->middleware(['permission:update_patient']);

    Route::post('notes', [NoteController::class, 'store'])
        ->name('note.store')
        ->middleware(['permission:create_note']);
    Route::get('notes', [NoteController::class, 'index'])
        ->name('notes.index')
        ->middleware(['permission:read_note']);
    Route::get('notes/{note}', [NoteController::class, 'show'])
        ->name('note.show')
        ->middleware(['permission:read_note']);
    Route::put('notes/{note}', [NoteController::class, 'update'])
        ->name('note.update')
        ->middleware(['permission:update_note']);
    Route::delete('notes/{note}', [NoteController::class, 'delete'])
        ->name('note.delete')
        ->middleware(['permission:delete_note']);
    Route::post('notes/bulk-create', [NoteController::class, 'bulkStore'])
        ->name('note.store.bulk')
        ->middleware(['permission:create_note']);
    Route::post('notes/bulk-update', [NoteController::class, 'bulkUpdate'])
        ->name('note.update.bulk')
        ->middleware(['permission:update_note']);

    Route::post('orders', [OrderController::class, 'store'])
        ->name('order.store')
        ->middleware(['permission:create_order']);
    Route::get('orders', [OrderController::class, 'index'])
        ->name('orders.index')
        ->middleware(['permission:read_order']);
    Route::get('orders/{order}', [OrderController::class, 'show'])
        ->name('order.show')
        ->middleware(['permission:read_order']);
    Route::put('orders/{order}', [OrderController::class, 'update'])
        ->name('order.update')
        ->middleware(['permission:update_order']);
    Route::delete('orders/{order}', [OrderController::class, 'delete'])
        ->name('order.delete')
        ->middleware(['permission:delete_order']);
    Route::post('orders/bulk-create', [OrderController::class, 'bulkStore'])
        ->name('order.store.bulk')
        ->middleware(['permission:create_order']);
    Route::post('orders/bulk-update', [OrderController::class, 'bulkUpdate'])
        ->name('order.update.bulk')
        ->middleware(['permission:update_order']);

    Route::post('enterprises', [EnterpriseController::class, 'store'])
        ->name('enterprise.store')
        ->middleware(['permission:create_enterprise']);
    Route::get('enterprises', [EnterpriseController::class, 'index'])
        ->name('enterprises.index')
        ->middleware(['permission:read_enterprise']);
    Route::get('enterprises/{enterprise}', [EnterpriseController::class, 'show'])
        ->name('enterprise.show')
        ->middleware(['permission:read_enterprise']);
    Route::put('enterprises/{enterprise}', [EnterpriseController::class, 'update'])
        ->name('enterprise.update')
        ->middleware(['permission:update_enterprise']);
    Route::delete('enterprises/{enterprise}', [EnterpriseController::class, 'delete'])
        ->name('enterprise.delete')
        ->middleware(['permission:delete_enterprise']);
    Route::post('enterprises/bulk-create', [EnterpriseController::class, 'bulkStore'])
        ->name('enterprise.store.bulk')
        ->middleware(['permission:create_enterprise']);
    Route::post('enterprises/bulk-update', [EnterpriseController::class, 'bulkUpdate'])
        ->name('enterprise.update.bulk')
        ->middleware(['permission:update_enterprise']);

    Route::post('medications', [MedicationController::class, 'store'])
        ->name('medication.store')
        ->middleware(['permission:create_medication']);
    Route::get('medications', [MedicationController::class, 'index'])
        ->name('medications.index')
        ->middleware(['permission:read_medication']);
    Route::get('medications/{medication}', [MedicationController::class, 'show'])
        ->name('medication.show')
        ->middleware(['permission:read_medication']);
    Route::put('medications/{medication}', [MedicationController::class, 'update'])
        ->name('medication.update')
        ->middleware(['permission:update_medication']);
    Route::delete('medications/{medication}', [MedicationController::class, 'delete'])
        ->name('medication.delete')
        ->middleware(['permission:delete_medication']);
    Route::post('medications/bulk-create', [MedicationController::class, 'bulkStore'])
        ->name('medication.store.bulk')
        ->middleware(['permission:create_medication']);
    Route::post('medications/bulk-update', [MedicationController::class, 'bulkUpdate'])
        ->name('medication.update.bulk')
        ->middleware(['permission:update_medication']);

    Route::post('departments', [DepartmentsController::class, 'store'])
        ->name('departments.store')
        ->middleware(['permission:create_departments']);
    Route::get('departments', [DepartmentsController::class, 'index'])
        ->name('departments.index')
        ->middleware(['permission:read_departments']);
    Route::get('departments/{departments}', [DepartmentsController::class, 'show'])
        ->name('departments.show')
        ->middleware(['permission:read_departments']);
    Route::put('departments/{departments}', [DepartmentsController::class, 'update'])
        ->name('departments.update')
        ->middleware(['permission:update_departments']);
    Route::delete('departments/{departments}', [DepartmentsController::class, 'delete'])
        ->name('departments.delete')
        ->middleware(['permission:delete_departments']);
    Route::post('departments/bulk-create', [DepartmentsController::class, 'bulkStore'])
        ->name('departments.store.bulk')
        ->middleware(['permission:create_departments']);
    Route::post('departments/bulk-update', [DepartmentsController::class, 'bulkUpdate'])
        ->name('departments.update.bulk')
        ->middleware(['permission:update_departments']);

    Route::post('encounters', [EncounterController::class, 'store'])
        ->name('encounter.store')
        ->middleware(['permission:create_encounter']);
    Route::get('encounters', [EncounterController::class, 'index'])
        ->name('encounters.index')
        ->middleware(['permission:read_encounter']);
    Route::get('encounters/{encounter}', [EncounterController::class, 'show'])
        ->name('encounter.show')
        ->middleware(['permission:read_encounter']);
    Route::put('encounters/{encounter}', [EncounterController::class, 'update'])
        ->name('encounter.update')
        ->middleware(['permission:update_encounter']);
    Route::delete('encounters/{encounter}', [EncounterController::class, 'delete'])
        ->name('encounter.delete')
        ->middleware(['permission:delete_encounter']);
    Route::post('encounters/bulk-create', [EncounterController::class, 'bulkStore'])
        ->name('encounter.store.bulk')
        ->middleware(['permission:create_encounter']);
    Route::post('encounters/bulk-update', [EncounterController::class, 'bulkUpdate'])
        ->name('encounter.update.bulk')
        ->middleware(['permission:update_encounter']);

    Route::post('blogs', [BlogController::class, 'store'])
        ->name('blog.store')
        ->middleware(['permission:create_blog']);
    Route::get('blogs', [BlogController::class, 'index'])
        ->name('blogs.index')
        ->middleware(['permission:read_blog']);
    Route::get('blogs/{blog}', [BlogController::class, 'show'])
        ->name('blog.show')
        ->middleware(['permission:read_blog']);
    Route::put('blogs/{blog}', [BlogController::class, 'update'])
        ->name('blog.update')
        ->middleware(['permission:update_blog']);
    Route::delete('blogs/{blog}', [BlogController::class, 'delete'])
        ->name('blog.delete')
        ->middleware(['permission:delete_blog']);
    Route::post('blogs/bulk-create', [BlogController::class, 'bulkStore'])
        ->name('blog.store.bulk')
        ->middleware(['permission:create_blog']);
    Route::post('blogs/bulk-update', [BlogController::class, 'bulkUpdate'])
        ->name('blog.update.bulk')
        ->middleware(['permission:update_blog']);

    Route::post('masters', [MasterController::class, 'store'])
        ->name('master.store')
        ->middleware(['permission:create_master']);
    Route::get('masters', [MasterController::class, 'index'])
        ->name('masters.index')
        ->middleware(['permission:read_master']);
    Route::get('masters/{master}', [MasterController::class, 'show'])
        ->name('master.show')
        ->middleware(['permission:read_master']);
    Route::put('masters/{master}', [MasterController::class, 'update'])
        ->name('master.update')
        ->middleware(['permission:update_master']);
    Route::delete('masters/{master}', [MasterController::class, 'delete'])
        ->name('master.delete')
        ->middleware(['permission:delete_master']);
    Route::post('masters/bulk-create', [MasterController::class, 'bulkStore'])
        ->name('master.store.bulk')
        ->middleware(['permission:create_master']);
    Route::post('masters/bulk-update', [MasterController::class, 'bulkUpdate'])
        ->name('master.update.bulk')
        ->middleware(['permission:update_master']);

    Route::post('events', [EventController::class, 'store'])
        ->name('event.store')
        ->middleware(['permission:create_event']);
    Route::get('events', [EventController::class, 'index'])
        ->name('events.index')
        ->middleware(['permission:read_event']);
    Route::get('events/{event}', [EventController::class, 'show'])
        ->name('event.show')
        ->middleware(['permission:read_event']);
    Route::put('events/{event}', [EventController::class, 'update'])
        ->name('event.update')
        ->middleware(['permission:update_event']);
    Route::delete('events/{event}', [EventController::class, 'delete'])
        ->name('event.delete')
        ->middleware(['permission:delete_event']);
    Route::post('events/bulk-create', [EventController::class, 'bulkStore'])
        ->name('event.store.bulk')
        ->middleware(['permission:create_event']);
    Route::post('events/bulk-update', [EventController::class, 'bulkUpdate'])
        ->name('event.update.bulk')
        ->middleware(['permission:update_event']);

    Route::post('appointment-slots', [AppointmentSlotController::class, 'store'])
        ->name('appointmentSlot.store')
        ->middleware(['permission:create_appointmentslot']);
    Route::get('appointment-slots', [AppointmentSlotController::class, 'index'])
        ->name('appointment-slots.index')
        ->middleware(['permission:read_appointmentslot']);
    Route::get('appointment-slots/{appointmentSlot}', [AppointmentSlotController::class, 'show'])
        ->name('appointmentSlot.show')
        ->middleware(['permission:read_appointmentslot']);
    Route::put('appointment-slots/{appointmentSlot}', [AppointmentSlotController::class, 'update'])
        ->name('appointmentSlot.update')
        ->middleware(['permission:update_appointmentslot']);
    Route::delete('appointment-slots/{appointmentSlot}', [AppointmentSlotController::class, 'delete'])
        ->name('appointmentSlot.delete')
        ->middleware(['permission:delete_appointmentslot']);
    Route::post('appointment-slots/bulk-create', [AppointmentSlotController::class, 'bulkStore'])
        ->name('appointmentSlot.store.bulk')
        ->middleware(['permission:create_appointmentslot']);
    Route::post('appointment-slots/bulk-update', [AppointmentSlotController::class, 'bulkUpdate'])
        ->name('appointmentSlot.update.bulk')
        ->middleware(['permission:update_appointmentslot']);

    Route::post('appointment-schedules', [AppointmentScheduleController::class, 'store'])
        ->name('appointmentSchedule.store')
        ->middleware(['permission:create_appointmentschedule']);
    Route::get('appointment-schedules', [AppointmentScheduleController::class, 'index'])
        ->name('appointment-schedules.index')
        ->middleware(['permission:read_appointmentschedule']);
    Route::get('appointment-schedules/{appointmentSchedule}', [AppointmentScheduleController::class, 'show'])
        ->name('appointmentSchedule.show')
        ->middleware(['permission:read_appointmentschedule']);
    Route::put('appointment-schedules/{appointmentSchedule}', [AppointmentScheduleController::class, 'update'])
        ->name('appointmentSchedule.update')
        ->middleware(['permission:update_appointmentschedule']);
    Route::delete('appointment-schedules/{appointmentSchedule}', [AppointmentScheduleController::class, 'delete'])
        ->name('appointmentSchedule.delete')
        ->middleware(['permission:delete_appointmentschedule']);
    Route::post('appointment-schedules/bulk-create', [AppointmentScheduleController::class, 'bulkStore'])
        ->name('appointmentSchedule.store.bulk')
        ->middleware(['permission:create_appointmentschedule']);
    Route::post('appointment-schedules/bulk-update', [AppointmentScheduleController::class, 'bulkUpdate'])
        ->name('appointmentSchedule.update.bulk')
        ->middleware(['permission:update_appointmentschedule']);

    Route::post('to-dos', [ToDoController::class, 'store'])
        ->name('toDo.store')
        ->middleware(['permission:create_todo']);
    Route::get('to-dos', [ToDoController::class, 'index'])
        ->name('to-dos.index')
        ->middleware(['permission:read_todo']);
    Route::get('to-dos/{toDo}', [ToDoController::class, 'show'])
        ->name('toDo.show')
        ->middleware(['permission:read_todo']);
    Route::put('to-dos/{toDo}', [ToDoController::class, 'update'])
        ->name('toDo.update')
        ->middleware(['permission:update_todo']);
    Route::delete('to-dos/{toDo}', [ToDoController::class, 'delete'])
        ->name('toDo.delete')
        ->middleware(['permission:delete_todo']);
    Route::post('to-dos/bulk-create', [ToDoController::class, 'bulkStore'])
        ->name('toDo.store.bulk')
        ->middleware(['permission:create_todo']);
    Route::post('to-dos/bulk-update', [ToDoController::class, 'bulkUpdate'])
        ->name('toDo.update.bulk')
        ->middleware(['permission:update_todo']);

    Route::post('chat-groups', [ChatGroupController::class, 'store'])
        ->name('chatGroup.store')
        ->middleware(['permission:create_chatgroup']);
    Route::get('chat-groups', [ChatGroupController::class, 'index'])
        ->name('chat-groups.index')
        ->middleware(['permission:read_chatgroup']);
    Route::get('chat-groups/{chatGroup}', [ChatGroupController::class, 'show'])
        ->name('chatGroup.show')
        ->middleware(['permission:read_chatgroup']);
    Route::put('chat-groups/{chatGroup}', [ChatGroupController::class, 'update'])
        ->name('chatGroup.update')
        ->middleware(['permission:update_chatgroup']);
    Route::delete('chat-groups/{chatGroup}', [ChatGroupController::class, 'delete'])
        ->name('chatGroup.delete')
        ->middleware(['permission:delete_chatgroup']);
    Route::post('chat-groups/bulk-create', [ChatGroupController::class, 'bulkStore'])
        ->name('chatGroup.store.bulk')
        ->middleware(['permission:create_chatgroup']);
    Route::post('chat-groups/bulk-update', [ChatGroupController::class, 'bulkUpdate'])
        ->name('chatGroup.update.bulk')
        ->middleware(['permission:update_chatgroup']);

    Route::post('comments', [CommentController::class, 'store'])
        ->name('comment.store')
        ->middleware(['permission:create_comment']);
    Route::get('comments', [CommentController::class, 'index'])
        ->name('comments.index')
        ->middleware(['permission:read_comment']);
    Route::get('comments/{comment}', [CommentController::class, 'show'])
        ->name('comment.show')
        ->middleware(['permission:read_comment']);
    Route::put('comments/{comment}', [CommentController::class, 'update'])
        ->name('comment.update')
        ->middleware(['permission:update_comment']);
    Route::delete('comments/{comment}', [CommentController::class, 'delete'])
        ->name('comment.delete')
        ->middleware(['permission:delete_comment']);
    Route::post('comments/bulk-create', [CommentController::class, 'bulkStore'])
        ->name('comment.store.bulk')
        ->middleware(['permission:create_comment']);
    Route::post('comments/bulk-update', [CommentController::class, 'bulkUpdate'])
        ->name('comment.update.bulk')
        ->middleware(['permission:update_comment']);

    Route::post('plans', [PlanController::class, 'store'])
        ->name('plan.store')
        ->middleware(['permission:create_plan']);
    Route::get('plans', [PlanController::class, 'index'])
        ->name('plans.index')
        ->middleware(['permission:read_plan']);
    Route::get('plans/{plan}', [PlanController::class, 'show'])
        ->name('plan.show')
        ->middleware(['permission:read_plan']);
    Route::put('plans/{plan}', [PlanController::class, 'update'])
        ->name('plan.update')
        ->middleware(['permission:update_plan']);
    Route::delete('plans/{plan}', [PlanController::class, 'delete'])
        ->name('plan.delete')
        ->middleware(['permission:delete_plan']);
    Route::post('plans/bulk-create', [PlanController::class, 'bulkStore'])
        ->name('plan.store.bulk')
        ->middleware(['permission:create_plan']);
    Route::post('plans/bulk-update', [PlanController::class, 'bulkUpdate'])
        ->name('plan.update.bulk')
        ->middleware(['permission:update_plan']);

    Route::post('chat-messages', [ChatMessageController::class, 'store'])
        ->name('chatMessage.store')
        ->middleware(['permission:create_chatmessage']);
    Route::get('chat-messages', [ChatMessageController::class, 'index'])
        ->name('chat-messages.index')
        ->middleware(['permission:read_chatmessage']);
    Route::get('chat-messages/{chatMessage}', [ChatMessageController::class, 'show'])
        ->name('chatMessage.show')
        ->middleware(['permission:read_chatmessage']);
    Route::put('chat-messages/{chatMessage}', [ChatMessageController::class, 'update'])
        ->name('chatMessage.update')
        ->middleware(['permission:update_chatmessage']);
    Route::delete('chat-messages/{chatMessage}', [ChatMessageController::class, 'delete'])
        ->name('chatMessage.delete')
        ->middleware(['permission:delete_chatmessage']);
    Route::post('chat-messages/bulk-create', [ChatMessageController::class, 'bulkStore'])
        ->name('chatMessage.store.bulk')
        ->middleware(['permission:create_chatmessage']);
    Route::post('chat-messages/bulk-update', [ChatMessageController::class, 'bulkUpdate'])
        ->name('chatMessage.update.bulk')
        ->middleware(['permission:update_chatmessage']);

    Route::post('tasks', [TaskController::class, 'store'])
        ->name('task.store')
        ->middleware(['permission:create_task']);
    Route::get('tasks', [TaskController::class, 'index'])
        ->name('tasks.index')
        ->middleware(['permission:read_task']);
    Route::get('tasks/{task}', [TaskController::class, 'show'])
        ->name('task.show')
        ->middleware(['permission:read_task']);
    Route::put('tasks/{task}', [TaskController::class, 'update'])
        ->name('task.update')
        ->middleware(['permission:update_task']);
    Route::delete('tasks/{task}', [TaskController::class, 'delete'])
        ->name('task.delete')
        ->middleware(['permission:delete_task']);
    Route::post('tasks/bulk-create', [TaskController::class, 'bulkStore'])
        ->name('task.store.bulk')
        ->middleware(['permission:create_task']);
    Route::post('tasks/bulk-update', [TaskController::class, 'bulkUpdate'])
        ->name('task.update.bulk')
        ->middleware(['permission:update_task']);

    Route::post('customers', [CustomerController::class, 'store'])
        ->name('customer.store')
        ->middleware(['permission:create_customer']);
    Route::get('customers', [CustomerController::class, 'index'])
        ->name('customers.index')
        ->middleware(['permission:read_customer']);
    Route::get('customers/{customer}', [CustomerController::class, 'show'])
        ->name('customer.show')
        ->middleware(['permission:read_customer']);
    Route::put('customers/{customer}', [CustomerController::class, 'update'])
        ->name('customer.update')
        ->middleware(['permission:update_customer']);
    Route::delete('customers/{customer}', [CustomerController::class, 'delete'])
        ->name('customer.delete')
        ->middleware(['permission:delete_customer']);
    Route::post('customers/bulk-create', [CustomerController::class, 'bulkStore'])
        ->name('customer.store.bulk')
        ->middleware(['permission:create_customer']);
    Route::post('customers/bulk-update', [CustomerController::class, 'bulkUpdate'])
        ->name('customer.update.bulk')
        ->middleware(['permission:update_customer']);

    Route::get('roles', [RoleController::class, 'index'])
        ->name('role.index')
        ->middleware(['permission:manage_roles']);
    Route::get('roles/{role}', [RoleController::class, 'show'])
        ->name('role.show')
        ->middleware(['permission:manage_roles']);
    Route::post('roles', [RoleController::class, 'store'])
        ->name('role.store')
        ->middleware(['permission:manage_roles']);
    Route::put('roles/{role}', [RoleController::class, 'update'])
        ->name('role.update')
        ->middleware(['permission:manage_roles']);
    Route::delete('roles/{role}', [RoleController::class, 'delete'])
        ->name('role.delete')
        ->middleware(['permission:manage_roles']);
    Route::post('roles/bulk-create', [RoleController::class, 'bulkStore'])
        ->name('role.store.bulk')
        ->middleware(['permission:manage_roles']);
    Route::post('roles/bulk-update', [RoleController::class, 'bulkUpdate'])
        ->name('role.update.bulk')
        ->middleware(['permission:manage_roles']);

    Route::get('permissions', [PermissionController::class, 'index'])
        ->name('permission.index')
        ->middleware(['permission:manage_roles']);
    Route::get('permissions/{permission}', [PermissionController::class, 'show'])
        ->name('permission.show')
        ->middleware(['permission:manage_roles']);

    Route::post('users/assign-role', [UserRoleController::class, 'assignRole'])
        ->name('users.role.assign')
        ->middleware(['permission:manage_roles']);
    Route::get('users/{user}/roles', [UserRoleController::class, 'getAssignedRoles'])
        ->name('get.assigned.roles')
        ->middleware(['permission:manage_roles']);
    Route::put('users/{user}/update-role', [UserRoleController::class, 'updateUserRole'])
        ->name('users.role.update')
        ->middleware(['permission:manage_roles']);
    Route::post('users/bulk-assign-role', [UserRoleController::class, 'bulkAssignRole'])
        ->name('users.bulk.assign.roles')
        ->middleware(['permission:manage_roles']);
});

Route::get('users', [UserController::class, 'index'])
    ->name('users.index');
Route::get('users/{user}', [UserController::class, 'show'])
    ->name('user.show');
Route::post('users', [UserController::class, 'store'])
    ->name('user.store');
Route::put('users/{user}', [UserController::class, 'update'])
    ->name('user.update');
Route::delete('users/{user}', [UserController::class, 'delete'])
    ->name('user.delete');
Route::post('users/bulk-create', [UserController::class, 'bulkStore'])
    ->name('user.store.bulk');
Route::post('users/bulk-update', [UserController::class, 'bulkUpdate'])
    ->name('user.update.bulk');

Route::post('register', [AuthController::class, 'register'])
    ->name('register');
Route::post('login', [AuthController::class, 'login'])
    ->name('login');
Route::post('logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth:sanctum');
Route::put('change-password', [AuthController::class, 'changePassword'])
    ->name('change.password')
    ->middleware(['auth:sanctum', 'validate.user']);
Route::post('forgot-password', [AuthController::class, 'forgotPassword'])
    ->name('forgot.password');
Route::post('validate-otp', [AuthController::class, 'validateResetPasswordOtp'])
    ->name('reset.password.validate.otp');
Route::put('reset-password', [AuthController::class, 'resetPassword'])
    ->name('reset.password');
