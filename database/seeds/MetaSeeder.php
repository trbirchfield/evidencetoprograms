<?php

use App\Models\Section;
use Illuminate\Database\Seeder;

class MetaSeeder extends Seeder {
	/**
	 * Seed the users table.
	 *
	 * @return void
	 */
	public function run() {
		// Section 1.0
		$section = Section::where('section', '1.0')->first();
		$section->meta_description = 'Explore research methods and study designs used to validate evidence-based programs and what criteria makes a health promotion program truly evidence-based';
		$section->meta_keywords    = 'evaluation study design, health promotion programs, EBP definition, Criteria for Evidence-Based Programs';
		$section->save();

		// Section 1.1
		$section = Section::where('section', '1.1')->first();
		$section->meta_description = 'Learn about the many advantages of evidence-based programs why you want to use them to benefit your organization';
		$section->meta_keywords    = 'benefits of EBPs';
		$section->save();

		// Section 1.2
		$section = Section::where('section', '1.2')->first();
		$section->meta_description = 'There are potential disadvantages of evidence-based programs and  challenges associated with cost, limited adaptability, and matching with the target audience';
		$section->meta_keywords    = 'cost of EBPs, challenges of EBPs, target audience of EBPs';
		$section->save();

		// Section 1.3
		$section = Section::where('section', '1.3')->first();
		$section->meta_description = 'Many factors impact your organziation readiness to implement evidence-based programs such as leadership, personnel, funding, & willingness to adhere to a model';
		$section->meta_keywords    = 'EBP, evidence based program, implementing EBPs';
		$section->save();

		// Section 2.0
		$section = Section::where('section', '2.0')->first();
		$section->meta_description = 'With a little self-examination and planning, your organization can select a suitable evidence-based program that best meets your community\'s needs.';
		$section->meta_keywords    = 'EBP, evidence based program';
		$section->save();

		// Section 2.1
		$section = Section::where('section', '2.1')->first();
		$section->meta_description = 'Synthesizing primary and secondary sources into a community needs assessment is a key first step to identify a health need to address with EBP';
		$section->meta_keywords    = 'EBP, evidence based program, collecting and analyazing community data, sources of community data, community needs assessment';
		$section->save();

		// Section 2.2
		$section = Section::where('section', '2.2')->first();
		$section->meta_description = 'A needs prioritization matrix is a useful tool to analyze community data and identified health needs in terms of importance and changability';
		$section->meta_keywords    = 'health needs priortization matrix, analyzing community data';
		$section->save();

		// Section 2.3
		$section = Section::where('section', '2.3')->first();
		$section->meta_description = 'There are a number of databases that allow you to search evidence-based programs maintained by various groups including NCOA, Aging Texas Well, and the CDC';
		$section->meta_keywords    = 'evidence-based interventions, EBP databases, NCOA, Aging Texas Well, CDC';
		$section->save();

		// Section 2.4
		$section = Section::where('section', '2.4')->first();
		$section->meta_description = 'A program champion who can garner support from organizational stakeholders will help overcome obstacles to implementation and promote organizational readiness';
		$section->meta_keywords    = 'selecting an EBP';
		$section->save();

		// Section 2.5
		$section = Section::where('section', '2.5')->first();
		$section->meta_description = 'The vision, mission, goals, and objectives of your organization are vital factors to consider when selecting an acceptable evidence-based program';
		$section->meta_keywords    = 'Matching organization purpose with EBP';
		$section->save();

		// Section 2.6
		$section = Section::where('section', '2.6')->first();
		$section->meta_description = 'Evidence-based program requirements (cost, training, reporting) should match the available organizational resources (personnel, supplies, facilities)';
		$section->meta_keywords    = 'EBP and resources required, cost of EBP, personnel requirement of EBP, training fro EBP';
		$section->save();

		// Section 2.7
		$section = Section::where('section', '2.7')->first();
		$section->meta_description = 'Suitability of an evidence-based program for your target audience depends on clientele interest, cultural and linguistic relevance, and contextual factors';
		$section->meta_keywords    = 'suitability of an EBP, contextual factors affecting EBPs, Cultural, linguistic relevance of EBP';
		$section->save();

		// Section 2.8
		$section = Section::where('section', '2.8')->first();
		$section->meta_description = 'Explore the importance and advantages of successful partnerships and community-based participatory approaches in facilitiating evidence-based programs';
		$section->meta_keywords    = 'community based particpatory approach, stakeholders in EBP implementation, facilitating EBP implementation';
		$section->save();

		// Section 2.9
		$section = Section::where('section', '2.9')->first();
		$section->meta_description = 'Selection of an evidence-based program requires understanding the financial requirements and identifying funding sources to cover the costs of implementation';
		$section->meta_keywords    = 'Funding resources for EBPs, implementation cost of EBP';
		$section->save();

		// Section 3.0
		$section = Section::where('section', '3.0')->first();
		$section->meta_description = 'Learn how to evaluate an evidence-based program and reasons why a thorough evaluation plan is critical to program success';
		$section->meta_keywords    = 'evaluating EBPs, why to evaluate EBPs, reasons to evaluate EBP, types of program evaluation';
		$section->save();

		// Section 3.1
		$section = Section::where('section', '3.1')->first();
		$section->meta_description = 'Process evaluation assessses the delivery of an evidence-based program and can have multiple components (fidelity, dose delivered, reach, satisfaction)';
		$section->meta_keywords    = 'tools to evaluate EBP delivery, EBP evaluation, delivery of EBP';
		$section->save();

		// Section 3.2
		$section = Section::where('section', '3.2')->first();
		$section->meta_description = 'Impact evaluation assesses the immediate, observable effects of an evidence-based program, and outcome evaluation assesses its long-term effects on participants';
		$section->meta_keywords    = 'data collection instruments, pre and post tests, observable effects of EBPs, EBP impact evaluation, EBP outcome evaluation';
		$section->save();

		// Section 3.3
		$section = Section::where('section', '3.3')->first();
		$section->meta_description = 'Realistic expectations for evidence-based program outcomes respects uncontrollable factors (challenges of changing health behaviors and program attendance)';
		$section->meta_keywords    = 'challenges during EBP implementation, expectation from EBPs';
		$section->save();

		// Section 4.0
		$section = Section::where('section', '4.0')->first();
		$section->title            = 'Implementing Evidence-Based Programs with Fidelity';
		$section->meta_description = 'Fidelity montiforing of your evidence-based program can consider adherence, dosage, delivery quality, target audience inclusion, and participant responsiveness';
		$section->meta_keywords    = 'fidelity in EBPs, EBP defintion, fidelity monitoring tool';
		$section->save();

		// Section 4.1
		$section = Section::where('section', '4.1')->first();
		$section->meta_description = 'A fidelity monitoring tool should consider key elements of your evidence-based program and be used regularly during implementation to understand any influence on outcomes';
		$section->meta_keywords    = 'fidelity monitoring, ';
		$section->save();

		// Section 4.2
		$section = Section::where('section', '4.2')->first();
		$section->meta_description = 'Adapting programs to local needs and preferences while maintaining fidelity';
		$section->meta_keywords    = 'Types of program adaptations, Adapting EBPs';
		$section->save();

		// Section 5.0
		$section = Section::where('section', '5.0')->first();
		$section->meta_description = 'Awareness and interest in an evidence-based program can be generated through cost-effective marketing and recruitment efforts that consider the target audience';
		$section->save();

		// Section 5.1
		$section = Section::where('section', '5.1')->first();
		$section->meta_description = 'Simple strategies that impact attendance can promote retention of particiants in your evidence-based program and prevent attrition';
		$section->save();

		// Section 5.2
		$section = Section::where('section', '5.2')->first();
		$section->meta_description = 'Explore the advantages of using lay leaders and where to recruit quality lay leaders who can implement an evidence-based program and motivate participants';
		$section->save();

		// Section 5.3
		$section = Section::where('section', '5.3')->first();
		$section->meta_description = 'Learn strategies to increase sustainability of an evidence-based program and consider the different levels of sustainability from individual to community';
		$section->save();

		// Section 5.4
		$section = Section::where('section', '5.4')->first();
		$section->meta_description = 'Continuous Quality Improvement and the RE-AIM framework are tools for quality assurance in evidence-based programming which is different from outcome evaluation';
		$section->save();
	}
}
