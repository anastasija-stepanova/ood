using lab_9.Model;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace lab_9.Controller
{
    public interface IMenuController
    {
        void SetAmplitude(int index, double value);
        void SetHarmonicType(int index, HarmonicType value);
        void SetFrequency(int index, double value);
        void SetPhase(int index, double value);
        void StartAddingHarmonic();
        void DeleteHarmonic(int index);
    }
}
