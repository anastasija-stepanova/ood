using System;
using Microsoft.VisualStudio.TestTools.UnitTesting;
using lab_9.Model;

namespace lab_9_tests
{
    [TestClass]
    public class HarmonicTests
    {
        [TestMethod]
        public void SetAmplitude_ObserverPropertiesChangedAfterSetAmplitude()
        {
            IHarmonic harmonic = new Harmonic();
            var harmonicObserver = new HarmonicObserver();

            harmonic.SetObserver(harmonicObserver);
            harmonic.SetAmplitude(10);

            Assert.IsTrue(harmonicObserver.PropertiesChanged);
        }

        [TestMethod]
        public void SetAmplitude_HarmonicPropertiesChangedAfterSetAmplitudeWithNullObserver()
        {
            IHarmonic harmonic = new Harmonic();
            harmonic.SetAmplitude(10);

            Assert.AreEqual(10, harmonic.GetAmplitude());
        }

        [TestMethod]
        public void SetFrequency_ObserverPropertiesChangedAfterSetFrequency()
        {
            IHarmonic harmonic = new Harmonic();
            var harmonicObserver = new HarmonicObserver();

            harmonic.SetObserver(harmonicObserver);
            harmonic.SetFrequency(10);

            Assert.IsTrue(harmonicObserver.PropertiesChanged);
        }

        [TestMethod]
        public void SetFrequency_HarmonicPropertiesChangedAfterSetFrequencyWithNullObserver()
        {
            IHarmonic harmonic = new Harmonic();
            harmonic.SetFrequency(10);

            Assert.AreEqual(10, harmonic.GetFrequency());
        }

        [TestMethod]
        public void SetPhase_ObserverPropertiesChangedAfterSetPhase()
        {
            IHarmonic harmonic = new Harmonic();
            var harmonicObserver = new HarmonicObserver();

            harmonic.SetObserver(harmonicObserver);
            harmonic.SetPhase(10);

            Assert.IsTrue(harmonicObserver.PropertiesChanged);
        }

        [TestMethod]
        public void SetPhase_HarmonicPropertiesChangedAfterSetPhaseWithNullObserver()
        {
            IHarmonic harmonic = new Harmonic();
            harmonic.SetPhase(10);

            Assert.AreEqual(10, harmonic.GetPhase());
        }

        [TestMethod]
        public void SetHarmonicKind_ObserverPropertiesChangedAfterSetHarmonicKind()
        {
            IHarmonic harmonic = new Harmonic();
            var harmonicObserver = new HarmonicObserver();

            harmonic.SetObserver(harmonicObserver);
            harmonic.SetHarmonicType(HarmonicType.Sin);

            Assert.IsTrue(harmonicObserver.PropertiesChanged);
        }

        [TestMethod]
        public void SetHarmonicKind_HarmonicPropertiesChangedAfterSetHarmonicKindWithNullObserver()
        {
            IHarmonic harmonic = new Harmonic();
            harmonic.SetHarmonicType(HarmonicType.Sin);

            Assert.AreEqual(HarmonicType.Sin, harmonic.GetHarmonicType());
        }
    }
}