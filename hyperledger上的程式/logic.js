/*
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */


/**
* @param {org.example.empty.tr_open_main_course} tr_open_main_course
* @transaction
*/
async function tr_open_main_course(settlement_credit){
    var teacher = settlement_credit.tr_id;
	var main_course = settlement_credit.main_course_id;
    var factory = getFactory();
    var NS = "org.example.empty";
    var tr_open_main_course_event = factory.newEvent(NS, 'TrOpenMainCourseEvent');
    var message = 'Teacher ' + teacher + ' open main_course '+main_course;
    tr_open_main_course_event.message = message;

    emit(tr_open_main_course_event);
   
 }


 /**
* @param {org.example.empty.stu_add_unit_course} stu_add_unit_course
* @transaction
*/
async function stu_add_unit_course(settlement_credit){
    var student = settlement_credit.stu_id;
	var unit_course = settlement_credit.unit_course_id;
    var factory = getFactory();
    var NS = "org.example.empty";
    var stu_add_unit_course_event = factory.newEvent(NS, 'StuAddUnitCourseEvent');
    var message = 'Student ' + student + ' add unit_course '+unit_course;
    stu_add_unit_course_event.message = message;

    emit(stu_add_unit_course_event);
   
 }
// 0721新增
 /**
* @param {org.example.empty.tr_open_unit_course} tr_open_unit_course
* @transaction
*/
async function tr_open_unit_course(settlement_credit){
    var teacher = settlement_credit.tr_id;
	var unit_course = settlement_credit.unit_course_id;
    var factory = getFactory();
    var NS = "org.example.empty";
    var tr_open_unit_course_event = factory.newEvent(NS, 'TrOpenUnitCourseEvent');
    var message = 'Teacher ' + teacher + ' open unit_course '+ unit_course;
    tr_open_unit_course_event.message = message;

    emit(tr_open_unit_course_event);
 }
// 0721新增
 /**
* @param {org.example.empty.stu_del_unit_course} stu_del_unit_course
* @transaction
*/
async function stu_del_unit_course(settlement_credit){
    var student = settlement_credit.stu_id;
	var unit_course = settlement_credit.unit_course_id;
    var factory = getFactory();
    var NS = "org.example.empty";
    var stu_del_unit_course_event = factory.newEvent(NS, 'StuDelUnitCourseEvent');
    var message = 'student ' + student + ' delete unit_course '+ unit_course;
    stu_del_unit_course_event.message = message;

    emit(stu_del_unit_course_event);
 }
// 0721新增
 /**
* @param {org.example.empty.stu_settlement} stu_settlement
* @transaction
*/
async function stu_settlement(settlement_credit){
    var student = settlement_credit.stu_id;
	var score = settlement_credit.score;
 	var if_pass = settlement_credit.if_pass;
    var factory = getFactory();
    var NS = "org.example.empty";
    var stu_settlement_event = factory.newEvent(NS, 'StuSettlementEvent');
    var message = 'student ' + student + ' settlement course_score '+ score + ' and pass_status:' + if_pass ;
    stu_settlement_event.message = message;

    emit(stu_settlement_event);
 }
 //0730 add
   /**
* @param {org.example.empty.stu_drop_course} stu_drop_course
* @transaction
*/
async function stu_drop_course(drop_course){
    var student = drop_course.student;
    var unit_course=drop_course.unit_course;
    var NS = "org.example.empty";
    //get assetRegistry
    var recordRegistry = await getAssetRegistry(NS + '.select_record');
    // query record
    var select_record = await query('select_record_in_student_and_unit_course', {'unit_course': unit_course.getFullyQualifiedIdentifier(), 'student': 'resource:' + student.getFullyQualifiedIdentifier()});
    var factory = getFactory();
    select_record.exit_class=true;
    if(unit_course.selection_course_people>0){
        unit_course.selection_course_people-=1;
    }
    //update asset
    await recordRegistry.update(select_record);
    // send event
    var stu_drop_unit_course_event = factory.newEvent(NS, 'StuDropCourse');
    var message = 'Student ' + student + ' drop unit_course '+unit_course;
    stu_drop_unit_course_event.message = message;
    emit(stu_add_unit_course_event);
 }