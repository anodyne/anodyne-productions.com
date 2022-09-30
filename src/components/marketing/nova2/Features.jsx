import clsx from 'clsx'
import { Container } from '@/components/marketing/Container'

const features = [
  {
    name: 'All-in-one website',
    description: 'A dedicated website with all of your content lets you easily show off your game to the world.',
    icon: function WebsiteIcon() {
      return (
        <>
          <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" d="M7.00004 6.84152C5.61083 5.13811 4.14406 6.34846 4.12476 7.65318C4.12476 9.59556 6.45032 11.1899 7.00004 11.1899C7.54976 11.1899 9.87534 9.59556 9.87534 7.65318C9.85604 6.34846 8.38925 5.13811 7.00004 6.84152Z" /><path stroke="currentColor" d="M0.959867 10.2685C1.114 11.7092 2.2727 12.8679 3.71266 13.0284C4.78221 13.1476 5.88037 13.25 7 13.25C8.11963 13.25 9.21779 13.1476 10.2873 13.0284C11.7273 12.8679 12.886 11.7092 13.0401 10.2685C13.1539 9.20502 13.25 8.11315 13.25 7C13.25 5.88684 13.1539 4.79498 13.0401 3.73147C12.886 2.29082 11.7273 1.13211 10.2873 0.971609C9.21779 0.852392 8.11963 0.75 7 0.75C5.88037 0.75 4.78221 0.852392 3.71266 0.971609C2.2727 1.13211 1.114 2.29082 0.959867 3.73147C0.846083 4.79498 0.75 5.88684 0.75 7C0.75 8.11315 0.846084 9.20502 0.959867 10.2685Z" /><path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" d="M13.0684 4L0.931641 4C0.9409 3.91029 0.95033 3.82078 0.959886 3.73147C1.11402 2.29082 2.27272 1.13211 3.71267 0.971609C4.78222 0.852392 5.88039 0.75 7.00002 0.75C8.11965 0.75 9.21781 0.852392 10.2874 0.971609C11.7273 1.13211 12.886 2.29082 13.0402 3.73147C13.0497 3.82078 13.0591 3.91029 13.0684 4Z" />
        </>
      )
    },
  },
  {
    name: 'Easy character management',
    description: "Manage all of your game's characters in one place and let players take ownership of the characters they play.",
    icon: function CharactersIcon() {
      return (
        <>
          <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" d="M4.82872 10.0856C4.51879 10.0806 4.21446 10.0023 3.94069 9.85691C2.99289 9.36602 2.20032 8.62117 1.65159 7.70564C1.10286 6.79011 0.8196 5.74 0.833488 4.67271L0.863159 2.07249C2.11535 1.41748 3.51057 1.08361 4.92362 1.10083C6.33667 1.11805 7.72334 1.48583 8.95919 2.17116L8.93484 4.16376" /><path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" d="M8.24858 13.0206C7.94624 13.089 7.63201 13.0846 7.33165 13.0081C7.0313 12.9315 6.75337 12.7848 6.52067 12.58C5.71222 11.8831 5.11357 10.975 4.79164 9.95734C4.4697 8.93967 4.43719 7.85251 4.69772 6.81742L5.32841 4.29466C6.6982 3.94726 8.13281 3.94538 9.50351 4.28918C10.8742 4.63299 12.1381 5.31173 13.1818 6.26448L12.5511 8.7786C12.2968 9.81463 11.76 10.7597 11.0004 11.5087C10.2407 12.2577 9.28811 12.7811 8.24858 13.0206Z" /><path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" d="M9.64184 8.17147C9.96075 8.02893 10.3991 8.09821 10.6309 8.21423" /><path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" d="M7.61284 7.63825C7.40669 7.33219 6.99638 7.22809 6.74137 7.26779" />
        </>
      )
    },
  },
  {
    name: 'Tell your stories',
    description: "An integrated story and posting system gives you and your players the freedom to tell your game's stories.",
    icon: function StoriesIcon() {
      return (
        <>
          <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" d="M5.0293 13.0294C4.43511 12.9989 3.86632 12.957 3.3475 12.9028C3.09788 12.9028 2.85849 12.8055 2.68198 12.6324C1.77509 11.3163 1.77026 2.50298 2.68198 1.17313C2.85849 1.00002 3.09788 0.902771 3.3475 0.902771C5.39071 0.68917 8.20894 0.667028 10.3016 0.779808C10.8208 0.807789 11.2187 1.24175 11.2187 1.76169L11.2186 5.02167" /><path stroke="currentColor" strokeLinecap="round" d="M0.75 3.90271H2.75" /><path stroke="currentColor" strokeLinecap="round" d="M0.75 9.90271H2.75" /><path stroke="currentColor" strokeLinejoin="round" d="M9.18396 13.2294L7.45245 13.3647L7.59297 11.6384L11.3574 7.72464C11.8335 7.22957 12.6234 7.22189 13.1091 7.7076V7.7076C13.5943 8.1928 13.5872 8.98163 13.0934 9.45804L9.18396 13.2294Z" />
        </>
      )
    },
  },
  {
    name: 'Post locking',
    description: 'Post locking intelligently locks and unlocks multi-author posts to help prevent your changes being overwritten.',
    icon: function PostLockingIcon() {
      return (
        <>
          <path stroke="currentColor" d="M1.88768 10.6061C2.0503 12.0408 3.26353 13.1594 4.70649 13.2106C5.43845 13.2366 6.19004 13.25 7.00008 13.25C7.81013 13.25 8.56171 13.2366 9.29367 13.2106C10.7366 13.1594 11.9499 12.0408 12.1125 10.6061C12.1692 10.1061 12.2084 9.59799 12.2084 9.08335C12.2084 8.56872 12.1692 8.06065 12.1125 7.56059C11.9499 6.1259 10.7366 5.00729 9.29367 4.95608C8.56171 4.93011 7.81013 4.91669 7.00008 4.91669C6.19004 4.91669 5.43845 4.93011 4.70649 4.95608C3.26353 5.00729 2.0503 6.1259 1.88768 7.56059C1.831 8.06065 1.79175 8.56872 1.79175 9.08335C1.79175 9.59799 1.831 10.1061 1.88768 10.6061Z" /><path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" d="M9.91659 4.91667V3.66667C9.91659 2.89312 9.60929 2.15125 9.06231 1.60427C8.51533 1.05729 7.77347 0.75 6.99992 0.75C6.22637 0.75 5.48451 1.05729 4.93752 1.60427C4.39054 2.15125 4.08325 2.89312 4.08325 3.66667V4.91667" /><path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" d="M7 8.50006L7 9.5" />
        </>
      )
    },
  },
  {
    name: 'Reporting',
    description: "Get valuable insights into activity, posting levels, and even forecasting game activity for the rest of the month.",
    icon: function ReportingIcon() {
      return (
        <>
          <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" d="M0.75 0.75V11.1205C0.75 12.1752 1.56805 13.0481 2.62142 13.1016C3.92678 13.1679 5.66667 13.2408 7 13.2408C9.44273 13.2408 13.25 12.9959 13.25 12.9959" /><path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" d="M3.5 7.86584C3.5 7.86584 5.44135 9.56008 6 9.24084C7.0853 8.62067 8.25 1.74084 9.375 1.74084C10.3125 1.74084 13 4.86584 13 4.86584" />
        </>
      )
    },
  },
  {
    name: 'Customize your way',
    description: "Change the way your site looks or works with tools to customize things any way you want.",
    icon: function CustomizableIcon() {
      return (
        <>
          <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" d="M9.12061 5.03643C8.30163 4.21744 8.25701 3.3407 9.93949 1.65822C10.0058 1.59192 9.99288 1.48046 9.91087 1.43501C8.39873 0.596888 6.92288 0.790403 5.67858 2.0347C4.51064 3.20265 4.26848 4.57459 4.93626 5.98907C4.96086 6.04119 4.94735 6.10361 4.90434 6.14198C4.31992 6.66338 3.72283 7.20397 3.1422 7.7846C2.56157 8.36523 2.02098 8.96232 1.49958 9.54674C0.878328 10.2431 0.744926 11.3273 1.32716 12.0566C1.41832 12.1708 1.51503 12.2812 1.61932 12.3854C1.7236 12.4897 1.83394 12.5864 1.94812 12.6776C2.67742 13.2598 3.76166 13.1264 4.45801 12.5052C5.04243 11.9838 5.63952 11.4432 6.22015 10.8626C6.80078 10.2819 7.34137 9.68483 7.86277 9.10041C7.90114 9.0574 7.96357 9.04389 8.01569 9.06849C9.43016 9.73626 10.8021 9.49409 11.97 8.32616C13.1743 7.12192 13.3943 5.70081 12.6475 4.23983C12.6188 4.18363 12.5435 4.17293 12.4988 4.21756C10.8163 5.90003 9.9396 5.85542 9.12061 5.03643Z" />
        </>
      )
    },
  },
]

function Feature({ feature, isActive, className, ...props }) {
  return (
    <div {...props}>
      <div className="inline-flex p-2.5 rounded-lg bg-slate-400">
        <svg aria-hidden="true" className="h-6 w-6 text-white" fill="none" viewBox="0 0 14 14">
          <feature.icon />
        </svg>
      </div>
      <p className="mt-4 font-display text-xl text-slate-800">
        {feature.name}
      </p>
      <p className="mt-2 text-sm text-slate-600">{feature.description}</p>
    </div>
  )
}

export function Features() {
  return (
    <section
      id="features"
      aria-label="Features for simplifying everyday business tasks"
      className="pt-20 pb-14 sm:pb-20 sm:pt-32 lg:pb-32"
    >
      <Container>
        <div className="mx-auto max-w-2xl md:text-center">
          <h2 className="font-display text-3xl tracking-tight text-slate-900 sm:text-4xl">
            Powerful RPG management features
          </h2>
          <p className="mt-4 text-lg tracking-tight text-slate-700">
            Simplify your RPG management with features and tools that will let
            you stop managing your game and start playing it again.
          </p>
        </div>

        <div className="mt-16 grid grid-cols-1 sm:grid-cols-3 sm:gap-x-8 gap-y-16">
          {features.map((feature, featureIndex) => (
              <Feature
                key={feature.name}
                feature={{
                  ...feature,
                  name: feature.name,
                }}
                className="relative"
              />
            ))}
        </div>
      </Container>
    </section>
  )
}
