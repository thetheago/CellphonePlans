<?php

use interfaces\AppInterface;

include_once('services/JsonService.php');
include_once('interfaces/AppInterface.php');

class App implements AppInterface
{

    private $data;

    private $plans;

    private $aparelho;

    private array $plansWorkflow;

    public function __construct(string $jsonPath) {
        $this->data     = JsonService::getJsonData($jsonPath);
        $this->aparelho = $this->data->Aparelho;
        $this->plans    = $this->data->plans;
        $this->filterData();
    }

    /**
     * Método responsável por filtrar os dados.
     * @return void
     */
    private function filterData()
    {

        $this->filterStartDate();
        $this->filterPriorityPlans();

    }

    /**
     * Método responsável por filtrar as datas "maiores" que hoje.
     * @return void
     */
    private function filterStartDate()
    {
        $plansFiltered = [];
        $today         = strtotime(date("Y/m/d h:i"));

        foreach ($this->plans as $plan) {
            $startDate = strtotime($plan->schedule->startDate);
            if ($today > $startDate) {
                $plansFiltered[] = $plan;
            }
        }

        $this->plans = $plansFiltered;
    }

    /**
     *
     * @return void
     */
    private function filterPriorityPlans()
    {

        foreach ($this->plans as $plan) {

            $idPlanoExistente = $plan->id-1;

            if (isset($this->plansWorkflow[$idPlanoExistente])) {

                $planoAtual                         = $plan;
                $planoAnterior                      = $this->plansWorkflow[$idPlanoExistente];

                $horaPlanoAtual                     = strtotime($plan->schedule->startDate);
                $horaPlanoAnterior                  = strtotime($this->plansWorkflow[$idPlanoExistente]->schedule->startDate);

                $prioridadePlanoAtual               = $plan->localidade->prioridade;
                $prioridadePlanoAnterior            =   $this->plansWorkflow[$idPlanoExistente]->localidade->prioridade;

                $localidadeNomePlanoAtual           = $planoAtual->localidade->nome;
                $localidadeNomePlanoAnterior        = $planoAnterior->localidade->nome;

                $nomePlanoAnteriorEIgual                = ($localidadeNomePlanoAtual === $localidadeNomePlanoAnterior);
                $prioridadePlanoAtualEMaiorQueAnterior  = ($prioridadePlanoAtual > $prioridadePlanoAnterior);
                $proridadePlanoAtualEIgualAoAnterior    = ($prioridadePlanoAtual === $prioridadePlanoAnterior);
                $horaPlanoAtualEMaiorQueAnterior        = ($horaPlanoAtual > $horaPlanoAnterior);

                if ($nomePlanoAnteriorEIgual) {
                    if ($prioridadePlanoAtualEMaiorQueAnterior) {
                        $this->plansWorkflow[$idPlanoExistente] = $plan;

                    } else if ($proridadePlanoAtualEIgualAoAnterior){

                        if ($horaPlanoAtualEMaiorQueAnterior) {
                            $this->plansWorkflow[$idPlanoExistente] = $plan;
                        }

                    } else {
                        $this->plansWorkflow[$idPlanoExistente] = $plan;
                    }
                } else {
                    $this->plansWorkflow[$idPlanoExistente] = $plan;
                }
            } else {
                $this->plansWorkflow[$plan->id] = $plan;
            }

        }

        $this->plans = $this->plansWorkflow;

    }

    public function show()
    {
        echo json_encode($this->plans);
    }
}